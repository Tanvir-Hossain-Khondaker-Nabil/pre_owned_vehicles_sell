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
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'documents', 'vehicleModel')->paginate(),
        ];
        return view('vehicle_info.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'vehicles'  => Vehicle::with('vehicleModels')->get(),
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
        if ($request->validated('supplier_id')) {
            $data['ownable_type'] = Supplier::class;
            $data['ownable_id']   = $request->validated('supplier_id');
        } elseif ($request->validated('customer_id')) {
            $data['ownable_type'] = Customer::class;
            $data['ownable_id']   = $request->validated('customer_id');
        }

        VehicleInfo::create(array_merge($request->validated(), $data));
        return redirect()->back();
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
    public function edit(VehicleInfo $vehicle_info)
    {
        $data = [
            'vehicles'     => Vehicle::with('vehicleModels')->get(),
            'suppliers'    => Supplier::get(),
            'customers'    => Customer::get(),
            'vehicle_info' => $vehicle_info,
        ];
        return view('vehicle_info.create_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVehicleInfoRequest $request, VehicleInfo $vehicle_info)
    {
        if ($request->validated('supplier_id')) {
            $data['ownable_type'] = Supplier::class;
            $data['ownable_id']   = $request->validated('supplier_id');
        } elseif ($request->validated('customer_id')) {
            $data['ownable_type'] = Customer::class;
            $data['ownable_id']   = $request->validated('customer_id');
        }

        $vehicle_info->update(array_merge($request->validated(), $data));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
