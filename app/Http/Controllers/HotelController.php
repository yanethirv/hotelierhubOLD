<?php

namespace App\Http\Controllers;

use App\Documenthotel;
use App\Room;
use App\Hotel;
use App\Mealplan;
use App\Photo;
use App\Policy;
use App\Position;
use App\Rateplan;
use App\Rateplans_room;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $experienceslist = DB::table('experiences')->pluck("name","id");

        //dd($hotel);

        return view('users.profile.hotel-profile',compact('hotel','experienceslist'));
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

        $experienceslist = DB::table('experiences')->pluck("name","id");

        $rooms = Room::where('hotel_id', '=', $hotel->id)->paginate(10);

        $restaurants = Restaurant::where('hotel_id', '=', $hotel->id)->paginate(10);

        $mealplans = Mealplan::where('hotel_id', '=', $hotel->id)->paginate(10);

        $policies = Policy::where('hotel_id', '=', $hotel->id)->paginate(10);

        $rateplans = Rateplan::where('hotel_id', '=', $hotel->id)->paginate(10);

        $photos = Photo::where('hotel_id', '=', $hotel->id)->paginate(10);

        $rateplansrooms = Rateplans_room::where('hotel_id', '=', $hotel->id)->paginate(10);

        $documents = Documenthotel::where('hotel_id', '=', $hotel->id)->paginate(10);

        return view('livewire.admin.users.show-hotel-profile',compact('hotel','experienceslist','rooms','restaurants',
                    'mealplans','policies','rateplans','photos','rateplansrooms','documents'));
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

        if ($file = $request->input('experience')) {
            $input = $request->all();
            $input['experience'] = $request->input('experience');
        }else{
            $input = $request->all();
            $input['experience'] = $hotel->experience;
        }

        $hotel->update($input);

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

        $experienceslist = DB::table('experiences')->pluck("name","id");

        $rooms = Room::where('hotel_id', '=', $hotel->id)->paginate(10);

        $restaurants = Restaurant::where('hotel_id', '=', $hotel->id)->paginate(10);

        $mealplans = Mealplan::where('hotel_id', '=', $hotel->id)->paginate(10);

        $policies = Policy::where('hotel_id', '=', $hotel->id)->paginate(10);

        $rateplans = Rateplan::where('hotel_id', '=', $hotel->id)->paginate(10);

        $photos = Photo::where('hotel_id', '=', $hotel->id)->paginate(10);

        $rateplansrooms = Rateplans_room::where('hotel_id', '=', $hotel->id)->paginate(10);

        $documents = Documenthotel::where('hotel_id', '=', $hotel->id)->paginate(10);

        //dd($hotelProfile);

        set_time_limit(300); // Extends to 5 minutes.
        
        $pdf = \PDF::loadView('admin.hotel.profile', ['hotel' => $hotel,'experienceslist' => $experienceslist,
                    'rooms' => $rooms,'restaurants' => $restaurants,'mealplans' => $mealplans,'policies' => $policies,'rateplans' => $rateplans,
                    'photos' => $photos,'rateplansrooms' => $rateplansrooms,'documents' => $documents]);
        return $pdf->download('hotel-profile.pdf');
    }
}
