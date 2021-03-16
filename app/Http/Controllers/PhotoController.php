<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller
{
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();

        return view('hotel.create-photo', compact('locations'));
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
            'name' => 'required','max:200',
            'location_id' => 'required',
            'photo' => 'required|file|max:204800|mimes:jpeg,jpg,png',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = 'Photo Upload!';

        $newPhotoName = null;

        if($file = $request->file('photo')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newPhotoName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/images/photos/hotel/'.$request->hotel_id.'/'), $newPhotoName);
            $newPhotoName = '/images/photos/hotel/'.$request->hotel_id.'/'.$newPhotoName;

            $photo = new Photo([
                'name' => $request->get('name'),
                'location_id' => $request->get('location_id'),
                'photo' => $newPhotoName,
                'hotel_id' => $request->get('hotel_id'),
            ]);
        }

        $photo->save();

        return redirect('hotel-photos')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);

        $locations = Location::all();

        return view('hotel.edit-photo', compact('photo','locations'));
    }

    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Photo");

        $request->validate([
            'name' => 'required','max:200',
            'location_id' => 'required',
            'photo' => 'sometimes|file|max:204800|mimes:jpeg,jpg,png',
            'hotel_id' => 'required',
        ]);

        $photo = Photo::findOrFail($id);
        $filename = public_path($photo->photo);
        File::delete($filename);

        $photo->name  = $request->name;
        $photo->location_id  = $request->location_id;
        $photo->status  = $request->status;
        $photo->hotel_id  = $request->hotel_id;

        $newPhotoName = null;

        //check if file attached
        if($file = $request->file('photo')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newPhotoName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/images/photos/hotel/'.$request->hotel_id.'/'), $newPhotoName);
            $newPhotoName = '/images/photos/hotel/'.$request->hotel_id.'/'.$newPhotoName;

            $photo->photo  = $newPhotoName;
        }

        $photo->save();
        
        return redirect('hotel-photos')->with('process_result',['status' => $status, 'content' => $content]);
    }
}
