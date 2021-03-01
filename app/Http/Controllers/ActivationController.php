<?php

namespace App\Http\Controllers;

use App\Type;

use App\Product;
use App\Activation;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function index() {
        
        $products = Product::where('status','active')
                            ->where('modality','activation')
                            ->paginate(25);
        $activationServices = [];
        if (auth()->check()) {
            $activationServices = auth()->user()->activationServices();
        }

        //dd($activationServices);

        $types = Type::all();

        $activations = Activation::where('user_id', '=', auth()->id())->get(); //activaciones del cliente

        return view("activation-services.index", compact("products", "types", "activationServices"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'status' => 'required'
        ]);

        $status = 'success';
        $content = 'Activation request sent!';

        $input = $request->all();
        
        $activationService = Activation::create($input);

        return redirect('activation-services')->with('process_result',['status' => $status, 'content' => $content]);
    }

        /**
     * Show the form for editing Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activationService = Activation::findOrFail($id);

        return view('activation-services.edit', compact('activationService'));
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activation  $activation
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Activation Service");

        $activation =  Activation::findOrFail($id);
        $activation->update($request->all());

        return redirect('activations-request')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
