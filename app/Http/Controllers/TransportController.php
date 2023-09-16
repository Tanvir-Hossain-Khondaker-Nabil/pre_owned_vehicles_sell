<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Transport;
use App\Models\VehicleInfo;
use App\Http\Requests\StoreTransportRequest;
use App\Http\Requests\UpdateTransportRequest;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'transport')->paginate(),
        ];
        return view('transport.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(VehicleInfo $vehicleInfo)
    {
        //
    }

    public function vehicleTransportCreate(VehicleInfo $vehicle_info): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $data = [
            'vehiclesInfo' => $vehicle_info,
            'transport'    => $vehicle_info->fees->where('workable_type', 'transport')->first(),
        ];
        return view('transport.create_edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransportRequest $request)
    {
        //
    }
    public function vehicleTransportStore(VehicleInfo $vehicle_info, StoreTransportRequest $request)
    {
        $vehicle_info->fees()->create([
            'workable_type' => 'transport',
            'amount'        => $request->amount,
            'details'       => $request->details,
        ]);
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'fees', 'vehicleModel')->where('current_status', 'transport')->paginate(),
        ];
        return view('transport.list', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transport $transport)
    {
        //
    }
    public function vehicleTransportEdit(VehicleInfo $vehicle_info)
    {
        $data = [
            'vehiclesInfo' => $vehicle_info,
            'transport'    => $vehicle_info->fees->where('workable_type', 'transport')->first(),
        ];
        return view('transport.create_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransportRequest $request, Transport $transport)
    {
        //
    }
    public function vehicleTransportUpdate(StoreTransportRequest $request, VehicleInfo $vehicle_info)
    {
        $vehicle_info->fees()
            ->where('workable_type', 'transport')
            ->first()
            ->update([
                'amount'  => $request->amount,
                'details' => $request->details,
            ]);
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'fees', 'vehicleModel')->where('current_status', 'transport')->paginate(),
        ];
        return view('transport.list', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transport $transport)
    {
        //
    }
    public function vehicleTransportDestroy(VehicleInfo $vehicle_info)
    {
        $vehicle_info->fees()
            ->where('workable_type', 'transport')
            ->first()
            ->delete();
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'fees', 'vehicleModel')->where('current_status', 'transport')->paginate(),
        ];
        return view('transport.list', $data);
    }
    public function vehicleTransportWorkshop(VehicleInfo $vehicle_info)
    {
        $vehicle_info->update([
            'current_status' => 'workshop'
        ]);
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'fees', 'vehicleModel')->where('current_status', 'transport')->paginate(),
        ];
        return view('transport.list', $data);
    }
}
