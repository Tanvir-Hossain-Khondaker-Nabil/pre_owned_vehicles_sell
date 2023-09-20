<?php

namespace App\Http\Controllers;

use App\Models\VehicleModel;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleModelRequest;
use App\Http\Requests\UpdateVehicleModelRequest;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'vehiclemodels' => VehicleModel::paginate(),
        ];

        $Vehicles = Vehicle::with('vehiclemodels')->get();
        return view('vehiclemodel.list', compact('Vehicles'), $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::get();
        return view('vehiclemodel.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleModelRequest $request)
    {
        //dd($request->validated());
        VehicleModel::create($request->validated());
        session()->put('success', 'Item created successfully.');
        return redirect()->route('vehiclemodels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleModel $vehicleModel)
    {
        return view ('vehiclemodel.create',compact('vehiclemodel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleModelRequest $request, VehicleModel $vehicleModel)
    {
        $vehiclemodel_data = $request;

        $vehiclemodel->update($vehiclemodel_data);

        session()->put('success', 'Item Updated successfully.');

        return redirect()->route('vehiclemodels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleModel $vehicleModel)
    {
        $vehiclemodel->delete();
        session()->put('success', 'Item Deleted successfully.');
        return redirect()->back();
    }
}
