<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Order;
use App\OrderLine;
use App\Product;
use App\Plan;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Exceptions\IncompletePayment;

class OrderController extends Controller
{
    public function index() {

        $currentPlan = auth()->user()->subscription('main');
        
        //dd($currentPlan);

        if($currentPlan == null)
        {
            $suscription = '';
        }
        else{
            $suscription = Plan::where('slug', $currentPlan->stripe_plan)->firstOrFail();
        }

        //dd($suscription);

        $orders = auth()->user()->orders()->paginate(10);

        return view("orders.index", compact("orders","suscription","currentPlan"));
    }

    public function show(int $id) {
        try {
            $order = Order::with("orderLines.product")->findOrFail($id);
            if ($order->user_id !== auth()->id()) {

                $status = 'success';
                $content = __("You do not have permission to view this order");
                return back()->with('process_result',['status' => $status, 'content' => $content]);
            }
            return view("orders.detail", compact('order'));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function process() {
        // Si no ha registrado una tarjeta...
        if ( ! auth()->user()->hasPaymentMethod()) {

            $status = 'warning';
            $content = __("You must add a payment method before processing the order");
            return redirect(route("billing.credit_card_form"))->with('process_result',['status' => $status, 'content' => $content]);
        }

        $order_id = null;

        try {
            DB::beginTransaction();

            $cart = new Cart;
            if (!$cart->hasProducts()) {
                $status = 'error';
                $content = __("No services to process");
                return back()->with('process_result',['status' => $status, 'content' => $content]);
            }

            $order = new Order;
            $order->user_id = auth()->id();
            $order->total_amount = $cart->totalAmount(false);
            $order->save();

            $order_id = $order->id;
            $orderLines = [];
            foreach ($cart->getContent() as $product) {
                $orderLines[] = [
                    "product_id" => $product->id,
                    "order_id" => $order->id,
                    "quantity" => $product->quantity,
                    "price" => $product->price,
                    "created_at" => now()
                ];
            }

            OrderLine::insert($orderLines);
            $cart->clear();
            DB::commit();

            /**
             * Cargo sin factura
             */
            //$paymentMethod = auth()->user()->defaultPaymentMethod();
            //auth()->user()->charge($order->total_amount * 100, $paymentMethod->id);

            /**
             * Cargo con factura
             */
            auth()->user()->invoiceFor(__("Purchase of Services"), $order->total_amount * 100, [], [
                'tax_percent' => env('STRIPE_TAXES'),
            ]);

            $status = 'success';
            $content = __("The order has been processed correctly");
            return back()->with('process_result',['status' => $status, 'content' => $content]);
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('orders.detail', ["id" => $order_id])]
            );
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function invoice(string $invoice) {
        try {
            return auth()->user()->downloadInvoice($invoice, [
                //'vendor' => 'env('APP_NAME')',
                'vendor' => 'STAND OUT HOTELS',
                'product' => __("Purchase of Services"),
            ]);
        } catch (\Exception $exception) {

        }
    }

    public function showInvoice(string $order) {
        try {
            //$order = Order::findOrFail($order);
            $order = Order::with("orderLines.product")->findOrFail($order);

            return view("orders.show-invoice", compact('order'));

        } catch (\Exception $exception) {

        }
    }

    public function downloadInvoice(string $order){

        $order = Order::with("orderLines.product")->findOrFail($order);
        
        $pdf = \PDF::loadView('orders.invoice', ['order' => $order]);
        return $pdf->download('invoice#'.$order->invoice_id.'.pdf');
    }

    public function toCart(int $id) {
        try {
            $status = 'success';
            $content =  __("The order has been correctly placed in the cart");

            $order = Order::with("orderLines")->findOrFail($id);
            $cart = new Cart;
            $cart->clear();
            foreach($order->orderLines as $orderLine) {
                $product = Product::find($orderLine->product_id);
                $product->quantity = $orderLine->quantity;
                $cart->addProduct($product);
            }
            $order->orderLines()->delete();
            $order->delete();
            return back()->with('process_result',['status' => $status, 'content' => $content]);

        } catch (\Exception $exception) {

        }
    }
}
