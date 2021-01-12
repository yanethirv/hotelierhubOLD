<?php

namespace App\Http\Controllers\Users;

use Auth;
use Hash;
use App\User;
use App\Hotel;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
   /**
    *
    * allow admin only
    *
    */
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
        $user = Auth::user();
        $positions = Position::all();

        return view('users.profile.profile',compact('user', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Profile");

        $request->validate([
            'name' => ['required','alpha', 'max:255'],
            'surname' => ['required','alpha', 'max:255'],
            'email' => ['required', 'email', 'max:255',Rule::unique('users')->ignore($id)],
            'mobile' => ['required','string', 'max:20'],
            'avatar' => ['sometimes','mimes:jpeg,jpg,bmp,svg,png','max:5000'],
            'position_id' => ['required'],
        ]);

        $newImageName = null;

        //check if file attached
        if($file = $request->file('avatar')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newImageName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/images/avatar'), $newImageName);
            $newImageName = '/images/avatar/' . $newImageName;
        }
        
        $user = User::find(Auth::user()->id);
        $newImage = null;
        $newImage = $newImageName == null? $user->avatar:$newImageName;
        $user->update(array_merge($request->all(),['avatar' => $newImage]));

        return redirect()->route('profile.index')->with('process_result',['status' => $status, 'content' => $content]);
    }

}
