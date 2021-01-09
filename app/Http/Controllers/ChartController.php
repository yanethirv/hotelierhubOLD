<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderLine;
use App\Subscription;
use App\ProductRequest;
use App\SubscriptionRequest;
use App\User;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;

class ChartController extends Controller
{
    public function index()
    {

        //DONUT - CLIENTS ESTATUS
        $usersStatus = (new LarapexChart)->setType('donut')
                ->setDataset([
                    User::where('status', '=', 'active')->where('type', '=', 'client')->count(), 
                    User::where('status', '=', 'inactive')->where('type', '=', 'client')->count()])
                ->setColors(['#7367F0', '#EA5455'])
                ->setLabels(['Actives', 'Inactives']);

        //TOTAL CLIENTS ACTIVES
        $usersActives = User::where('status', '=', 'active')->where('type', '=', 'client')->count();
        //TOTAL CLIENTS INACTIVES
        $usersInactives = User::where('status', '=', 'inactive')->where('type', '=', 'client')->count();
        //TOTAL CLIENTS
        $clientsTotal = User::where('type', '=', 'client')->count();

        //LINE - TOTALS CLIENTS PER MONTH
        $usersPerMonth = (new LarapexChart)->setType('line')
            ->setXAxis([
                'Jan', 'Feb', 'Mar', 'Apr', 'Marc', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ])
            ->setDataset([
                [
                    'name'  =>  'Registered Users',
                    'data'  =>  [
                        User::whereMonth('created_at', '01')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '02')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '03')->where('type', '=', 'client')->count(),  
                        User::whereMonth('created_at', '04')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '05')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '06')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '07')->where('type', '=', 'client')->count(),  
                        User::whereMonth('created_at', '08')->where('type', '=', 'client')->count(),
                        User::whereMonth('created_at', '09')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '10')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '11')->where('type', '=', 'client')->count(), 
                        User::whereMonth('created_at', '12')->where('type', '=', 'client')->count()
                    ]
                ]
            ]);

        //$subscriptionsCompletes = DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
        //    ->select("subscriptions.stripe_status", "plans.amount")
        //    ->where('subscriptions.stripe_status', '=', 'complete')
        //    ->get();

        //TOTAL AMOUNT SUBSCRIPTIONS
        $totalAmountSubscriptions = DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                                    ->select("subscriptions.stripe_status", "plans.amount")
                                    ->where('subscriptions.stripe_status', '=', 'complete')
                                    ->sum('plans.amount');

        //$totalAmountSuscriptions = 0;
        //foreach($subscriptionsCompletes as $subscription){
        //    $totalAmountSuscriptions = $subscription->amount + $totalAmountSuscriptions;
        //}

        //LINE - TOTAL AMOUNT SUBSCRIPTIONS PER MONTH
        $amountPerMonthSubscriptions = (new LarapexChart)->setType('line')
            ->setXAxis([
                'Jan', 'Feb', 'Mar', 'Apr', 'Marc', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ])
            ->setColors(['#7367F0'])
            ->setDataset([
                [
                    'name'  =>  'Amount $',
                    'data'  =>  [
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '01')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '02')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '03')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '04')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '05')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '06')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '07')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '08')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '09')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '10')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '11')
                            ->sum('plans.amount'),
                        DB::table("subscriptions")->join("plans", "plans.slug", "=", "subscriptions.stripe_plan")
                            ->select("subscriptions.stripe_status", "plans.amount")
                            ->where('subscriptions.stripe_status', '=', 'complete')
                            ->whereMonth('subscriptions.created_at', '12')
                            ->sum('plans.amount')
                    ]
                ]
            ]);

        //TOTAL AMOUNT PRODUCTS
        $totalAmountProducts = Order::sum('total_amount');

        //TOTAL ORDERS
        $totalOrders = Order::count();

        $amountPerMonthProducts = (new LarapexChart)->setType('line')
        ->setXAxis([
            'Jan', 'Feb', 'Mar', 'Apr', 'Marc', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ])
        ->setColors(['#ffc63b'])
        ->setDataset([
            [
                'name'  =>  'Amount $',
                'data'  =>  [
                    Order::whereMonth('created_at', '01')->sum('total_amount'),
                    Order::whereMonth('created_at', '02')->sum('total_amount'),
                    Order::whereMonth('created_at', '03')->sum('total_amount'),
                    Order::whereMonth('created_at', '04')->sum('total_amount'),
                    Order::whereMonth('created_at', '05')->sum('total_amount'),
                    Order::whereMonth('created_at', '06')->sum('total_amount'),
                    Order::whereMonth('created_at', '07')->sum('total_amount'),
                    Order::whereMonth('created_at', '08')->sum('total_amount'),
                    Order::whereMonth('created_at', '09')->sum('total_amount'),
                    Order::whereMonth('created_at', '10')->sum('total_amount'),
                    Order::whereMonth('created_at', '11')->sum('total_amount'),
                    Order::whereMonth('created_at', '12')->sum('total_amount'),
                ]
            ]
        ]);

        //TOTAL PRODUCTS REQUEST ACTIVE
        $productsRequestActive = OrderLine::where('status', '=', 'active')->count();
        //TOTAL PRODUCTS REQUEST PROCESS
        $productsRequestProcess = OrderLine::where('status', '=', 'process')->count();
        //TOTAL PRODUCTS REQUEST WAIT
        $productsRequestWait = OrderLine::where('status', '=', 'wait')->count();

        //TOTAL SUBSCRIPTIONS REQUEST ACTIVE
        $subscriptionsRequestActive = Subscription::where('status', '=', 'active')->where('stripe_status', '=', 'complete')->count();
        //TOTAL SUBSCRIPTIONS REQUEST PROCESS
        $subscriptionsRequestProcess = Subscription::where('status', '=', 'process')->where('stripe_status', '=', 'complete')->count();
        //TOTAL SUBSCRIPTIONS REQUEST WAIT
        $subscriptionsRequestWait = Subscription::where('status', '=', 'wait')->where('stripe_status', '=', 'complete')->count();


        $nuevo = (new LarapexChart)->setTitle('Net Profit')
        ->setSubtitle('From January To March')
        ->setType('bar')
        ->setXAxis(['Jan', 'Feb', 'Mar'])
        ->setGrid(true)
        ->setDataset([
            [
                'name'  => 'Company A',
                'data'  =>  [500, 1000, 1900]
            ],
            [
                'name'  => 'Company B',
                'data'  => [300, 900, 1400]
            ],
            [
                'name'  => 'Company C',
                'data'  => [430, 245, 500]
            ]
        ])
        ->setStroke(1);


        $requestPerMonthProducts = (new LarapexChart)->setType('line')
        ->setXAxis([
            'Jan', 'Feb', 'Mar', 'Apr', 'Marc', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ])
        ->setColors(['#7367F0'])
        ->setDataset([
            [
                'name'  =>  'Products',
                'data'  =>  [
                    OrderLine::whereMonth('created_at', '01')->count(), 
                    OrderLine::whereMonth('created_at', '02')->count(), 
                    OrderLine::whereMonth('created_at', '03')->count(), 
                    OrderLine::whereMonth('created_at', '04')->count(), 
                    OrderLine::whereMonth('created_at', '05')->count(), 
                    OrderLine::whereMonth('created_at', '06')->count(), 
                    OrderLine::whereMonth('created_at', '07')->count(), 
                    OrderLine::whereMonth('created_at', '08')->count(), 
                    OrderLine::whereMonth('created_at', '09')->count(), 
                    OrderLine::whereMonth('created_at', '10')->count(), 
                    OrderLine::whereMonth('created_at', '11')->count(), 
                    OrderLine::whereMonth('created_at', '12')->count(), 
                ]
            ]
        ]);

        $requestPerMonthSubscription = (new LarapexChart)->setType('line')
        ->setXAxis([
            'Jan', 'Feb', 'Mar', 'Apr', 'Marc', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ])
        ->setColors(['#ffc63b'])
        ->setDataset([
            [
                'name'  =>  'Subscriptions',
                'data'  =>  [
                    Subscription::whereMonth('created_at', '01')->count(), 
                    Subscription::whereMonth('created_at', '02')->count(), 
                    Subscription::whereMonth('created_at', '03')->count(), 
                    Subscription::whereMonth('created_at', '04')->count(), 
                    Subscription::whereMonth('created_at', '05')->count(), 
                    Subscription::whereMonth('created_at', '06')->count(), 
                    Subscription::whereMonth('created_at', '07')->count(), 
                    Subscription::whereMonth('created_at', '08')->count(), 
                    Subscription::whereMonth('created_at', '09')->count(), 
                    Subscription::whereMonth('created_at', '10')->count(), 
                    Subscription::whereMonth('created_at', '11')->count(), 
                    Subscription::whereMonth('created_at', '12')->count(), 
                ]
            ]
        ]);

        //dd($requestPerMonthProducts);

        return view('admin.charts.index', compact('usersStatus', 'usersActives', 'usersInactives', 'clientsTotal', 
                                                'usersPerMonth', 'totalAmountSubscriptions', 'amountPerMonthSubscriptions',
                                                'totalAmountProducts', 'totalOrders', 'amountPerMonthProducts', 'productsRequestActive',
                                                'productsRequestProcess', 'productsRequestWait', 'subscriptionsRequestActive',
                                                'subscriptionsRequestProcess', 'subscriptionsRequestWait', 'nuevo',
                                                'requestPerMonthProducts','requestPerMonthSubscription'));
    }
}
