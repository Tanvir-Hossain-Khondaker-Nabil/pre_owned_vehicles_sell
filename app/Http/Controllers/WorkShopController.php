<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WorkShop;

class WorkShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'workshops' => WorkShop::paginate(),
        ];
        return view('workshop.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workshop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $workshop_data = $request->all();

        WorkShop::create($workshop_data);
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
    public function edit(workshop $workshop)
    {
        return view ('workshop.create',compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, workshop $workshop)
    {
        $workshop_data = $request->all();

        $workshop->update($workshop_data);

        session()->put('success', 'Item Updated successfully.');

        return redirect()->route('workshops.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(workshop $workshop)
    {
        $washcolor->delete();
        session()->put('success', 'Item Deleted successfully.');
        return redirect()->back();
    }
}
