<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    public function creditCardForm() {
        return view("billing.credit-card");
    }

    public function processCreditCardForm() {
        $this->validate(request(), [
            'card_number' => 'required',
            'card_exp_year' => 'required',
            'card_exp_month' => 'required',
            'cvc' => 'required'
        ]);

        try {
            DB::beginTransaction();
            //\Stripe\Stripe::setApiKey('pk_test_51HGq5UJUTe1AbOcmXy56MmoEdfpPbdi8OtCX3bIzWMvf39de2JsgfdiUvq29jb1cfzCLwCJVfCFKaCIHzQR68iDq00HTZiSxSM');
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            //if ( ! auth()->user()->stripe_id) {
            if ( ! auth()->user()->hasPaymentMethod()) {
                auth()->user()->createAsStripeCustomer();
            }

            $paymentMethod = \Stripe\PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => request('card_number'),
                    'exp_month' => request('card_exp_month'),
                    'exp_year' => request('card_exp_year'),
                    'cvc' => request('cvc'),
                ]
            ]);
            auth()->user()->updateDefaultPaymentMethod($paymentMethod->id);
            auth()->user()->save();
            DB::commit();

            $status = 'success';
            $content = __("Correctly updated card");
            return back()->with('process_result',['status' => $status, 'content' => $content]);
        } catch (\Exception $exception) {
            DB::rollBack();

            $status = 'error';
            $content = $exception->getMessage();
            return back()->with('process_result',['status' => $status, 'content' => $content]);
        }
    }
}
