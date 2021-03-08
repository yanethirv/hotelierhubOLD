<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\SubscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubscriptionRequestController extends Controller
{
    public function create()
    {
        return view('livewire.admin.subscriptions-request.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        return DB::transaction(function() use ($request) {
            $request->validate([
                'subscription_id' => 'required',
                'user_id' => 'required',
                'status' => 'required'
            ]);

            $status = 'success';
            $content = 'Status Request Updated!';

            $input = $request->all();
            
            $subscriptiontRequest = SubscriptionRequest::create($input);

            $subscription = Subscription::findOrFail($request->subscription_id);

            $subscription->update(['status'=>$request->status]);

            return redirect('subscriptions-request')->with('process_result',['status' => $status, 'content' => $content]);
        });
    }

            /**
     * Show the form for editing Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceRecurring = SubscriptionRequest::where('subscription_id', $id)->first();

        return view('services-recurring.edit', compact('serviceRecurring'));
    }

    public function update(Request $request, $id)
    {

        return DB::transaction(function() use ($request, $id) {
            $status = 'success';
            $content = __("Updated Subscriptions Request");

            $serviceRecurring =  SubscriptionRequest::findOrFail($id);

            $subscription = Subscription::findOrFail($serviceRecurring->subscription_id);

            $serviceRecurring->update($request->all());

            $subscription->update(['status'=>$request->status]);

            return redirect('subscriptions-request')->with('process_result',['status' => $status, 'content' => $content]);
        });
    }
}
