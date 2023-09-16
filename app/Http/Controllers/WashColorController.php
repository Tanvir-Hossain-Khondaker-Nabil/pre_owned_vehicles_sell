<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WashColor;

class WashColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'washcolors' => WashColor::paginate(),
        ];
        return view('washcolor.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('washcolor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $washcolor_data = $request->all();

        WashColor::create($washcolor_data);
        session()->put('success', 'Item created successfully.');
        return redirect()->route('washcolors.index');
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
    public function edit(washcolor $washcolor)
    {
        return view ('washcolor.create',compact('washcolor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, washcolor $washcolor)
    {
        $washcolor_data = $request->all();

        $washcolor->update($washcolor_data);

        session()->put('success', 'Item Updated successfully.');

        return redirect()->route('washcolors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WashColor $washcolor)
    {
        $washcolor->delete();
        session()->put('success', 'Item Deleted successfully.');
        return redirect()->back();
    }
}
