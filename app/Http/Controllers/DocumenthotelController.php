<?php

namespace App\Http\Controllers;

use App\Documenthotel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DocumenthotelController extends Controller
{
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create-document');
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
            'document' => 'required|file|max:204800|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
            'hotel_id' => 'required',
        ]);

        $status = 'success';
        $content = 'Document Created!';

        $newDocumentName = null;

        if($file = $request->file('document')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newDocumentName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/documents/hotel/'.$request->hotel_id.'/'), $newDocumentName);
            $newDocumentName = '/documents/hotel/'.$request->hotel_id.'/'. $newDocumentName;

            $documentResource = new Documenthotel([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'document' => $newDocumentName,
                'hotel_id' => $request->get('hotel_id')
            ]);
        }

        $documentResource->save();

        return redirect('documents-hotel')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $document = Documenthotel::findOrFail($id);

        return view('hotel.edit-document', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Document");

        $request->validate([
            'name' => 'required','max:200',
            'status' => 'required',
            'document' => 'sometimes|file|max:204800|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
            'hotel_id' => 'required',
        ]);

        $document = Documenthotel::findOrFail($id);

        $filename = public_path($document->document);
        File::delete($filename);

        $document->name  = $request->name;
        $document->description  = $request->description;
        $document->status  = $request->status;
        $document->hotel_id  = $request->hotel_id;

        $newDocumentName = null;

        //check if file attached
        if($file = $request->file('document')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newDocumentName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/documents/hotel/'.$request->hotel_id.'/'), $newDocumentName);
            $newDocumentName = '/documents/hotel/'.$request->hotel_id.'/'. $newDocumentName;

            $document->document  = $newDocumentName;
        }

        $document->save();
        
        return redirect('documents-hotel')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function viewDocument($id)
    {
        $data = Documenthotel::find($id);

        return view('livewire.admin.documents.details', compact('data'));

    }

    public function downloadDocument($document)
    {

        return response()->download('upload/'.$document);

    }
}
