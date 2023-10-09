<?php

namespace App\Http\Controllers;


use App\Models\Color;
use App\Models\VehicleInfo;
use Illuminate\Http\Request;

class ColorController extends Controller
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
        $data = [
            'colors' => Color::paginate(),
        ];
        return view('color.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $color_data = $request->all();

        Color::create($color_data);
        session()->put('success', 'Item created successfully.');
        return redirect()->route('colors.create');
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
    public function edit(Color $color)
    {
        $edit = '';
        $data = [
            'colors' => Color::paginate(),
        ];
        return view('color.create', compact('color', 'edit'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, color $color)
    {
        $color_data = $request->all();

        $color->update($color_data);

        session()->put('success', 'Item Updated successfully.');

        return redirect()->route('colors.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        session()->put('success', 'Item Deleted successfully.');
        return redirect()->back();
    }
}
