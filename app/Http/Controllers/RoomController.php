<?php

namespace App\Http\Controllers;

use App\Room;
use App\Typeroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typerooms = Typeroom::all();

        return view('hotel.create-room', compact('typerooms'));
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
            'code' => 'required','max:30',
            'typeroom_id' => 'required',
            'number_rooms' => 'required',
            'ocupancy' => 'required',
            'description' => 'required',
            'hotel_id' => 'required'
            //'extra_person' => 'required',
            //'late_check_out' => 'required',
            //'early_check_in' => 'required',
            //'roll_away_bed' => 'required',
            //'pet_fee' => 'required',
        ]);

        $status = 'success';
        $content = 'Room Created!';

        $input = $request->all();
        
        $room = Room::create($input);

        return redirect('rooms')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);

        $typerooms = Typeroom::all();

        return view('hotel.edit-room', compact('room','typerooms'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'code' => 'required','max:30',
            'typeroom_id' => 'required',
            'number_rooms' => 'required',
            'ocupancy' => 'required',
            'description' => 'required',
            'hotel_id' => 'required'
            //'extra_person' => 'required',
            //'late_check_out' => 'required',
            //'early_check_in' => 'required',
            //'roll_away_bed' => 'required',
            //'pet_fee' => 'required',
        ]);

        $status = 'success';
        $content = __("Updated Room");

        $room = Room::findOrFail($id);

        $room->update($request->all());

        return redirect('rooms')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
