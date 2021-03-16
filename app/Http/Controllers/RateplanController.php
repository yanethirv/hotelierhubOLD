<?php

namespace App\Http\Controllers;

use App\Rateplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RateplanController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create-rateplan');
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
            'name' => 'required','max:100',
            'suggestion' => 'required',
            'description' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = 'Rate Plan Created!';

        $input = $request->all();
        
        $rateplan = Rateplan::create($input);

        return redirect('rate-plans')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $rateplan = Rateplan::findOrFail($id);

        return view('hotel.edit-rateplan', compact('rateplan'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required','max:100',
            'suggestion' => 'required',
            'description' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = __("Updated Rate Plan");

        $rateplan = Rateplan::findOrFail($id);

        $rateplan->update($request->all());

        return redirect('rate-plans')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
