<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Cashier\Exceptions\IncompletePayment;
use App\Type;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index() {
        $plans = \App\Plan::where('status','active')->paginate(25);
        $currentPlan = auth()->user()->subscription('main');
        $priceCurrentPlan = null;
        if ($currentPlan) {
            if ($currentPlan->active()) {
                $plan = \App\Plan::whereSlug($currentPlan->stripe_plan)->first();
                $priceCurrentPlan = $plan->amount;
            }
        }
        return view("admin.plan.index", compact("plans", "priceCurrentPlan"));
    }

    public function create() {

        $types = Type::all();

        return view("admin.plan.create", compact('types'));
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'plan_name' => 'required|unique:plans,nickname|string|max:200',
            'plan_price' => 'required|numeric',
            'plan_cost' => 'required|numeric',
            'type_id' => 'required',
            'status' => 'required',
            'plan_description' => 'max:250',
            'document' => 'sometimes|file|max:5000|mimes:pdf'
        ]);

        try {
            DB::beginTransaction();
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $plan = \Stripe\Plan::create([
                'currency' => env("CASHIER_CURRENCY"),
                'interval' => env("CASHIER_INTERVAL"),
                "product" => [
                    "name" => request('plan_name')
                ],
                'nickname' => request('plan_name'),
                'id' => Str::slug(request('plan_name')),
                'amount' => request('plan_price') * 100
            ]);

            $newDocumentName = null;

            if ($plan) {
                if($file = $request->file('document')){
                    $tmp = explode('.', $file->getClientOriginalName());//get client file name
                    $newDocumentName = round(microtime(true)).'.'.end($tmp);
                    $file->move(public_path('/documents/subscriptions'), $newDocumentName);
                    $newDocumentName = '/documents/subscriptions/' . $newDocumentName;

                    $valor = $request->get('type_id');
                    $typeName = Type::select('name')
                                    ->where('id', '=', $valor)
                                    ->get();

                    \App\Plan::create([
                        'product' => $plan->product,
                        'nickname' => request('plan_name'),
                        'amount' => request('plan_price'),
                        'description' => request('plan_description'),
                        'slug' => $plan->id,
                        'cost' => request('plan_cost'),
                        'type_id' => request('type_id'),
                        'type_name' =>  $typeName,
                        'status' => request('status'),
                        'document' => $newDocumentName,
                    ]);
                }else{
                    $valor = $request->get('type_id');
                    $typeName = Type::select('name')
                                    ->where('id', '=', $valor)
                                    ->get();

                    \App\Plan::create([
                        'product' => $plan->product,
                        'nickname' => request('plan_name'),
                        'amount' => request('plan_price'),
                        'description' => request('plan_description'),
                        'slug' => $plan->id,
                        'cost' => request('plan_cost'),
                        'type_id' => request('type_id'),
                        'type_name' =>  $typeName,
                        'status' => request('status'),
                    ]);
                }
            }
            DB::commit();

            $status = 'success';
            $content = __("Subscription created correctly");
            return redirect(route('suscriptions'))->with('process_result',['status' => $status, 'content' => $content]);
        } catch (\Exception $exception) {
            DB::rollBack();
            $plan = \Stripe\Plan::retrieve(Str::slug(request('plan_name')));
            if ($plan) {
                $plan->delete();
            }

            session()->flash('message', ['danger', $exception->getMessage()]);
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $suscription = \App\Plan::findOrFail($id);
        $types = Type::all();

        //dd($suscription);

        return view('admin.plan.edit', compact('suscription', 'types'));
    }

    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Suscription");

        $request->validate([
            'type_id' => 'required',
            'status' => 'required',
            'description' => 'required',
            'document' => 'sometimes|file|max:5000|mimes:pdf'
        ]);

        $suscription =  \App\Plan::findOrFail($id);
  
        $valor = $request->type_id;
        $typeName = Type::select('name')
                        ->where('id', '=', $valor)
                        ->get();

        $suscription->type_id  = $request->type_id;
        $suscription->type_name  = $typeName;
        $suscription->status  = $request->status;
        $suscription->description  = $request->description;
        
        $newDocumentName = null;

        //check if file attached
        if($file = $request->file('document')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newDocumentName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/documents/subscriptions'), $newDocumentName);
            $newDocumentName = '/documents/subscriptions/' . $newDocumentName;

            $suscription->document  = $newDocumentName;
        }

        $suscription->save();

        return redirect('suscriptions')->with('process_result',['status' => $status, 'content' => $content]);
    }

    /**
     *
     * Contratar suscripciones y subir de plan
     *
     * @param $hash
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function buy () {
        if ( ! auth()->user()->hasPaymentMethod()) {
            $status = 'warning';
            $content = __("Please, add a card to sign up for a suscription");
            return back()->with('process_result',['status' => $status, 'content' => $content]);
        }

        $planId = (int) request("plan");

        $this->validate(request(), [
            'plan' => 'required'
        ]);

        //obtenemos el plan que se está intentando contratar
        $plan = \App\Plan::find($planId);

        try {
            //nos aseguramos que el plan a contratar es el correcto
            if ($planId === $plan->id) {
                $currentPlan = auth()->user()->subscription('main');

                // si no ha finalizado subimos el plan
                if ($currentPlan && ! $currentPlan->ended()) {
                    $currentPlanForCompare = \App\Plan::whereSlug($currentPlan->stripe_plan)->first();
                    //comparamos los precios para saber que el próximo plan tiene un precio superior
                    if ($currentPlanForCompare) {
                        if ($currentPlanForCompare->amount < $plan->amount) {
                            //subimos el plan y generamos la factura al momento!
                            auth()->user()->subscription('main')->swapAndInvoice($plan->slug);

                            $status = 'info';
                            $content = __("You have changed to the subscription  ' . $plan->nickname . ' correctly, remember to check your email in case you need to confirm the payment");
                            return redirect(route("plans.index"))->with('process_result',['status' => $status, 'content' => $content]);
                        }
                    }
                } else {
                    // si nunca ha contratado una suscripción
                    auth()->user()->newSubscription('main', $plan->slug)->create();

                    $status = 'info';
                    $content = __("You have subscribed to ' . $plan->nickname . ' correctly, remember to check your email in case it is necessary to confirm the payment");
                    return redirect(route("plans.index"))->with('process_result',['status' => $status, 'content' => $content]);
                }
            } else {
                $status = 'info';
                $content = __("The selected subscription seems not to be available");
                return back()->with('process_result',['status' => $status, 'content' => $content]);
            }
        } catch (IncompletePayment $exception) {

            $status = 'success';
            $content = __("You have subscribed to ' . $plan->nickname . ' correctly");

            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => back()->with('process_result',['status' => $status, 'content' => $content])]
            );
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }

        return abort(401);
    }

    public function resumeSubscription () {
        $subscription = request()->user()->subscription(request('plan'));
        if ($subscription->cancelled()) {
            request()->user()->subscription(request('plan'))->resume();
            $status = 'success';
            $content = __("You have successfully resumed your subscription");
            return back()->with('process_result',['status' => $status, 'content' => $content]);
        }
        $status = 'error';
        $content = __("Subscription cannot be resumed, please consult your administrator");
        return back()->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function cancelSubscription () {
        auth()->user()->subscription(request('plan'))->cancel();
        $status = 'success';
        $content = __("The subscription has been successfully cancelled");
        return back()->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function showInvoice(string $plan) {
        try {
            $currentPlan = auth()->user()->subscription('main');

            
        
            $plan = \App\Plan::findOrFail($plan);

            //dd($plan);

            return view("admin.plan.show-invoice", compact('currentPlan','plan'));

        } catch (\Exception $exception) {

        }
    }

    public function downloadInvoice(string $plan)
    {

        $currentPlan = auth()->user()->subscription('main');

        $plan = \App\Plan::findOrFail($plan);

        //dd($plan);

        $pdf = \PDF::loadView('admin.plan.invoice', ['currentPlan' => $currentPlan,'plan' => $plan]);
        return $pdf->download('invoice#'.$currentPlan->stripe_id.'.pdf');
    }

    public function detail(int $id) {

        try {
            $currentPlan = auth()->user()->subscription('main');

            $plan = \App\Plan::findOrFail($id);

            return view("admin.plan.detail", compact('currentPlan','plan'));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function downloadDocument($document)
    {

        return response()->download('upload/'.$document);

    }
}
