<?php

namespace App\Http\Controllers;
use App\Models\Document;

use Illuminate\Http\Request;

class VehicleDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $documents = Document::all();
        return view('vehicle_doc.list', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle_doc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string',

        ]);

        $documents = new Document;

        $documents->name = $request->name;

        $documents->save();
        return redirect()->route('vehicledoc.create')->with('success', "New vehicledoc create Successfully");


    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $documents = Document::find($id);
        return view('vehicle_doc.edit', compact('documents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [

            'name' => 'required|string',
          

        ]);

        $documents = Document::find($id);
        $documents->name = $request->name;
    
        $documents->save();
        return redirect()->route('vehicledoc.list')->with('success', "vehicle doc Update Successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $documents = Document::find($id);


      

        $documents->delete();
        return redirect()->route('vehicledoc.list')->with('success','vehicle doc Deleteed Successfully');
    }
}
