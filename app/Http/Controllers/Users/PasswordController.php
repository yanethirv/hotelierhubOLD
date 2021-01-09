<?php


namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class PasswordController extends Controller
{

    public function __construct() {
        $this->middleware('role:admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = User::findOrFail($id);

        return view('livewire.admin.users.change-password',compact('userId'));
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
        $content = __("Updated Password");

        $this->validate($request, [
            'newpassword' => ['required'],
            'confirmpassword' => ['same:newpassword'],
        ]);

        $user = User::findOrFail($id);

        $user->password = bcrypt($request->newpassword);

        User::where('id', $user->id)->update(array('password' => $user->password));

        return redirect()->route('user.show',$user->id)->with('process_result',['status' => $status, 'content' => $content]);
    }
}