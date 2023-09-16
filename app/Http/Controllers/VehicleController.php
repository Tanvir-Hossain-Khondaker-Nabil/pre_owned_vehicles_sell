<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'vehicles' => Vehicle::paginate(),
        ];
        return view('vehicle.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $vehicle_data = $request->except(['company_logo']);

        $file = " ";

        if($file = $request->file('company_logo')){
            $imageName = time().'-vehicle'.'.'.$file->getClientOriginalExtension();
            $vehicle_data['company_logo'] = $file->move('upload/vehicle/',$imageName);
        }

        Vehicle::create($vehicle_data);
        session()->put('success', 'Vehicle created successfully.');
        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view ('vehicle.create',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle_data = $request->except(['company_logo']);

        $file = " ";
        $deleteOldImage = $vehicle->company_logo;

        if($file = $request->file('company_logo')){
            if(file_exists($deleteOldImage)){
                unlink($deleteOldImage);
            }
            $imageName = time().'-vehicle'.'.'.$file->getClientOriginalExtension();
            $vehicle_data['company_logo'] = $file->move('upload/history/',$imageName);
        }
        else{
            $vehicle_data['company_logo'] = $vehicle->company_logo;
        }

        $vehicle->update($vehicle_data);

        session()->put('success', 'Vehicle Updated successfully.');

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        $deleteOldImage = $vehicle->company_logo;
        if(file_exists($deleteOldImage)){
            unlink($deleteOldImage);
        }

        $vehicle->delete();
        session()->put('success', 'Vehicle Deleted successfully.');
        return redirect()->back();
    }
}
