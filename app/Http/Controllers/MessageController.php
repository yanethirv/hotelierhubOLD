<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Notifications\MessageSent;
Use \Carbon\Carbon;

class MessageController extends Controller
{
    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->get();

        return view('admin.messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $status = 'success';
        $content =  __("Message sent successfully");

        $this->validate($request, [
            'recipient_id' => 'required|exists:users,id',
            'subject' => 'required',
            'body' => 'required',
            'document' => 'file|max:5000|mimes:pdf'
        ]);

        if($request->file('document')){
            $file = $request->file('document');
            $ruta = public_path() . '/upload';
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move($ruta, $fileName);
        }else{
            $fileName = null;
        }

        //return $request->all();
        $message = Message::create([
            'sender_id' => auth()->id(),
            'recipient_id' => $request->recipient_id,
            'subject' => $request->subject,
            'body' => $request->body,
            'date_at' => Carbon::now(),
            'document' => $fileName
        ]);

        $recipient = User::find($request->recipient_id);

        $recipient->notify(new MessageSent($message));

        return back()->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('admin.messages.show', compact('message'));
    }

    public function downloadDocument($document)
    {

        return response()->download('upload/'.$document);

    }
}
