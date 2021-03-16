<?php

namespace App\Http\Controllers;

use App\Mealplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MealplanController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create-mealplan');
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
            'rate' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = 'Meal Plan Created!';

        $input = $request->all();
        
        $mealplan = Mealplan::create($input);

        return redirect('meal-plans')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $mealplan = Mealplan::findOrFail($id);

        return view('hotel.edit-mealplan', compact('mealplan'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required','max:100',
            'rate' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = __("Updated Meal Plan");

        $mealplan = Mealplan::findOrFail($id);

        $mealplan->update($request->all());

        return redirect('meal-plans')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
