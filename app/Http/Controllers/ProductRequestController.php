<?php

namespace App\Http\Controllers;

use App\OrderLine;
use App\ProductRequest;

use Illuminate\Http\Request;


class ProductRequestController extends Controller
{
    public function create()
    {

        return view('livewire.admin.products-request.create');
    }

    public function store(Request $request)
    {
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
    }
}
