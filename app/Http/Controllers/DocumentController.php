<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DocumentController extends Controller
{
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.admin.documents.create');
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
            'document' => 'required|file|max:204800|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx'
        ]);

        $status = 'success';
        $content = 'Resource Created!';

        $newDocumentName = null;

        if($file = $request->file('document')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newDocumentName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/documents/resources'), $newDocumentName);
            $newDocumentName = '/documents/resources/' . $newDocumentName;

            $documentResource = new Document([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'document' => $newDocumentName
            ]);
        }

        $documentResource->save();

        return redirect('documents-resources')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);

        return view('livewire.admin.documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $status = 'success';
        $content = __("Updated Resource");

        $request->validate([
            'name' => 'required','max:200',
            'status' => 'required',
            'document' => 'sometimes|file|max:204800|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx'
        ]);

        $document = Document::findOrFail($id);

        
        $document->name  = $request->name;
        $document->description  = $request->description;
        $document->status  = $request->status;

        $newDocumentName = null;

        //check if file attached
        if($file = $request->file('document')){
            $tmp = explode('.', $file->getClientOriginalName());//get client file name
            $newDocumentName = round(microtime(true)).'.'.end($tmp);
            $file->move(public_path('/documents/resources'), $newDocumentName);
            $newDocumentName = '/documents/resources/' . $newDocumentName;

            $document->document  = $newDocumentName;
        }

        $document->save();
        
        return redirect('documents-resources')->with('process_result',['status' => $status, 'content' => $content]);
    }

    public function viewDocument($id)
    {
        $data = Document::find($id);

        return view('livewire.admin.documents.details', compact('data'));

    }

    public function downloadDocument($document)
    {

        return response()->download('upload/'.$document);

    }
}
