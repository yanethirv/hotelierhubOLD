<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HotelController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::where('user_id', '=', Auth::user()->id)->first();

        //dd($hotel);

        return view('users.profile.hotel-profile',compact('hotel'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::where('user_id', '=', $id)->first();

        return view('livewire.admin.users.show-hotel-profile',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Hotel Profile");

        $hotel =  Hotel::findOrFail($id);
        $hotel->update($request->all());

        return redirect('hotel-profile/'.$hotel->user_id)->with('process_result',['status' => $status, 'content' => $content]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }

    public function downloadProfile(string $hotel)
    {
        $hotel = Hotel::findOrFail($hotel);

        //dd($hotelProfile);

        $pdf = \PDF::loadView('admin.hotel.profile', ['hotel' => $hotel]);
        return $pdf->download('hotel-profile.pdf');
    }
}
