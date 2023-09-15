<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\VehicleInfo;
use Illuminate\Http\Request;

use App\Http\Requests\StoreVehicleInfoRequest;

class VehicleInfoController extends Controller
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
            'vehicles'  => Vehicle::get(),
            'suppliers' => Supplier::get(),
            'customers' => Customer::get(),
        ];
        return view('vehicle_info.create_edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleInfoRequest $request)
    {
        dd($request->validated());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
