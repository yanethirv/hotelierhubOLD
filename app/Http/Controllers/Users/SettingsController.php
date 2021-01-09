<?php


namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(Auth::user()->id);

        return view('users.profile.update-password',compact('user'));
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
       

        $this->validate($request, [
            'oldpassword' => ['required'],
            'newpassword' => ['required'],
            'confirmpassword' => ['same:newpassword'],
        ]);

        $hashedPassword = Auth::user()->password;

        if (\Hash::check($request->oldpassword, $hashedPassword)) {

            if (!\Hash::check($request->newpassword, $hashedPassword)) {

                $status = 'success';
                $content = __("Updated Password");

                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);
                User::where('id', Auth::user()->id)->update(array('password' => $users->password));

                return redirect()->back()->with('process_result',['status' => $status, 'content' => $content]);
            }
            else{
                $status = 'warning';
                $content =  __("The new password cannot be the same as the current password");
                
                return redirect()->back()->with('process_result',['status' => $status, 'content' => $content]);
            }
        }
        else{
            $status = 'error';
            $content =  __("The current password does not match");

            return redirect()->back()->with('process_result',['status' => $status, 'content' => $content]);
        }
    }
}
