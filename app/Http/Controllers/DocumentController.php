<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\VehicleInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }


    public function documentCreate(VehicleInfo $vehicle_info)
    {
        $data = [
            'documents'    => Document::get(),
            'vehiclesInfo' => $vehicle_info
        ];
        return view('vehicle_doc.add_doc', $data);
    }


    public function vehicleDocumentStore(VehicleInfo $vehicle_info, Request $request)
    {
        $validated = $request->validate([
            'doc_'          => 'required',
            'doc_.*'        => 'required',
            'details'       => 'nullable',
            'details.*'     => 'nullable',
            'document_id'   => 'required',
            'document_id.*' => 'required',
        ]);

        foreach ($vehicle_info->documents as $document) {
            if (file_exists($document->pivot->path)) {
                unlink($document->pivot->path);
            }
        }
        $vehicle_info->documents()->detach();

        foreach ($validated['document_id'] as $key => $document_id) {
            $docFile  = $validated['doc_'][$key];
            $document = Document::find($key);
            if (file($docFile)) {
                $imageName = time() . '_' . Str::slug($document->name) . '.' . $docFile->getClientOriginalExtension();
                $imagePath = $docFile->move('upload/doc/' . Str::slug($document->name) . '/', $imageName);
                $vehicle_info->documents()->attach($document->id, ['path' => $imagePath, 'details' => $validated['details'][$key]]);
            }
        }
        return redirect()->route('vehicle.document.view', $vehicle_info->id);
    }

    public function documentView(VehicleInfo $vehicle_info)
    {
        $data = [
            'vehiclesInfo' => $vehicle_info
        ];
        return view('vehicle_doc.view_doc', $data);
    }
}
