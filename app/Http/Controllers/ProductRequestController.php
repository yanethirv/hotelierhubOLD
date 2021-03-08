<?php

namespace App\Http\Controllers;

use App\OrderLine;
use App\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductRequestController extends Controller
{
    public function create()
    {

        return view('livewire.admin.products-request.create');
    }

    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {
            $request->validate([
                'order_line_id' => 'required',
                'user_id' => 'required',
                'status' => 'required'
            ]);

            $status = 'success';
            $content = 'Status Request Updated!';

            $input = $request->all();
            
            $productRequest = ProductRequest::create($input);

            $orderLine = OrderLine::findOrFail($request->order_line_id);

            $orderLine->update(['status'=>$request->status]);

            return redirect('services-request')->with('process_result',['status' => $status, 'content' => $content]);
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
        $productRequest = ProductRequest::where('order_line_id', $id)->first();

        return view('payment-services-request.edit', compact('productRequest'));
    }

    public function update(Request $request, $id)
    {

        return DB::transaction(function() use ($request, $id) {
            $status = 'success';
            $content = __("Updated Payment Service Request");

            $input = $request->all();
            
            $productRequest = ProductRequest::findOrFail($id);

            $orderLine = OrderLine::findOrFail($productRequest->order_line_id);

            $productRequest->update($request->all());

            $orderLine->update(['status'=>$request->status]);

            return redirect('services-request')->with('process_result',['status' => $status, 'content' => $content]);
        });
    }


}
