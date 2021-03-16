<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Typerestaurant;
use App\Locationrestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RestaurantController extends Controller
{
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typerestaurants = Typerestaurant::all();
        $locationrestaurants = Locationrestaurant::all();

        return view('hotel.create-restaurant', compact('typerestaurants','locationrestaurants'));
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
            'pax' => 'required',
            'open_time' => 'required',
            'closing_time' => 'required',
            'theme' => 'required',
            'typerestaurant_id' => 'required',
            'included' => 'required',
            'locationrestaurant_id' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = 'Restaurant Created!';

        $input = $request->all();
        
        $restaurant = Restaurant::create($input);

        return redirect('restaurants')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $typerestaurants = Typerestaurant::all();
        $locationrestaurants = Locationrestaurant::all();

        return view('hotel.edit-restaurant', compact('restaurant','typerestaurants','locationrestaurants'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required','max:100',
            'pax' => 'required',
            'open_time' => 'required',
            'closing_time' => 'required',
            'theme' => 'required',
            'typerestaurant_id' => 'required',
            'included' => 'required',
            'locationrestaurant_id' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = __("Updated Restaurant");

        $restaurant = Restaurant::findOrFail($id);

        $restaurant->update($request->all());

        return redirect('restaurants')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
