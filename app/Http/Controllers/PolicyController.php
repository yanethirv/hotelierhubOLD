<?php

namespace App\Http\Controllers;

use App\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PolicyController extends Controller
{
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create-policy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'type' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = 'Policy Created!';

        $input = $request->all();
        
        $policy = Policy::create($input);

        return redirect('policies')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $policy = Policy::findOrFail($id);

        return view('hotel.edit-policy', compact('policy'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'description' => 'required',
            'type' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = __("Updated Policy");

        $policy = Policy::findOrFail($id);

        $policy->update($request->all());

        return redirect('policies')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
