<?php

namespace App\Http\Controllers;

use App\Rateplan;
use App\Room;
use App\Rateplans_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RateplanroomController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rateplans = Rateplan::where('hotel_id', '=',Auth::user()->hotel->id)->get();

        $rooms = Room::where('hotel_id', '=',Auth::user()->hotel->id)->get();

        return view('hotel.create-rateplanroom', compact('rateplans','rooms'));
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
            'rateplan_id' => 'required',
            'room_id' => 'required',
            'rate' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = 'Rate Created!';

        //$input = $request->all();
        
        //$rateplanroom = Rateplans_room::create($input);

        $rateplan = Rateplan::findOrFail($request->rateplan_id);

        $room = Room::findOrFail($request->room_id);
        //dd($room->code);

        $rateplanroom = new Rateplans_room([
            'rateplan_id' => $request->get('rateplan_id'),
            'rateplan' => $rateplan->name,
            'room_id' => $request->get('room_id'),
            'room' => $room->code,
            'rate' => $request->get('rate'),
            'hotel_id' => $request->get('hotel_id'),
        ]);

        $rateplanroom->save();

        return redirect('rateplans-rooms')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $rateplanroom = Rateplans_room::findOrFail($id);

        return view('hotel.edit-rateplanroom', compact('rateplanroom'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'rateplan_id' => 'required',
            'room_id' => 'required',
            'rate' => 'required',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = __("Updated Rate");

        $rateplanroom = Rateplans_room::findOrFail($id);

        $rateplanroom->update($request->all());

        return redirect('rateplans-rooms')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
