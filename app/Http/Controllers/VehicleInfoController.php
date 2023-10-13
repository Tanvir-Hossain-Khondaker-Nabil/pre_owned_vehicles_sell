<?php

namespace App\Http\Controllers;

use App\Models\Color;
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
    public function index(Request $request)
    {
        if ($request->supplier_id) {
            $vehicleInfo = VehicleInfo::with('ownable', 'color', 'vehicleModel')->where([
                'ownable_id'   => $request->supplier_id,
                'ownable_type' => 'App\Models\Supplier',
            ])->get();
        } else {
            $vehicleInfo = VehicleInfo::with('ownable', 'color', 'vehicleModel')->get();
        }
        $data = [
            'vehiclesInfos' => $vehicleInfo,
            'suppliers'     => Supplier::get(),
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
            'colors'    => Color::get(),
        ];
        return view('vehicle_info.create', $data);
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

        if ($serial_no = 6000) {
            $data['serial_no'] = $serial_no + 1;
        } else {
            $data['serial_no'] = date('Y') . '0001';
        }

        $vehPho = $request->validated('vehicle_photo');
        $vehDoc = $request->validated('vehicle_doc');
        if (file_exists($vehPho)) {
            $vehPhoName            = time() . '_photo_' . '.' . $vehPho->getClientOriginalExtension();
            $vehPhoPath            = $vehPho->move('upload/photo/', $vehPhoName);
            $data['vehicle_photo'] = $vehPhoPath;
        }
        if (file_exists($vehDoc)) {
            $vehDocName          = time() . '_doc_' . '.' . $vehDoc->getClientOriginalExtension();
            $vehDocPath          = $vehDoc->move('upload/doc/', $vehDocName);
            $data['vehicle_doc'] = $vehDocPath;
        }

        VehicleInfo::create(array_merge($request->validated(), $data));
        session()->put('success', 'Item Updated successfully.');
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
            'colors'       => Color::get(),
            'vehicle_info' => $vehicle_info,
        ];
        return view('vehicle_info.edit', $data);
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


        $vehPho = $request->validated('vehicle_photo');
        $vehDoc = $request->validated('vehicle_doc');
        if (file_exists($vehPho)) {
            if (file_exists(public_path($vehicle_info->vehicle_photo))) {
                unlink(public_path($vehicle_info->vehicle_photo));
            }
            $vehPhoName            = time() . '_photo_' . '.' . $vehPho->getClientOriginalExtension();
            $vehPhoPath            = $vehPho->move('upload/photo/', $vehPhoName);
            $data['vehicle_photo'] = $vehPhoPath;
        }
        if (file_exists($vehDoc)) {
            if (file_exists(public_path($vehicle_info->vehicle_doc))) {
                unlink(public_path($vehicle_info->vehicle_doc));
            }
            $vehDocName          = time() . '_doc_' . '.' . $vehDoc->getClientOriginalExtension();
            $vehDocPath          = $vehDoc->move('upload/doc/', $vehDocName);
            $data['vehicle_doc'] = $vehDocPath;
        }

        $vehicle_info->update(array_merge($request->validated(), $data));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleInfo $vehicle_info)
    {
        dd($vehicle_info);
        return redirect()->back();
    }

    public function bulkStatusChange(Request $request)
    {
        foreach ($request->vehicles_info_id ?? [] as $key => $vehicles_info_id) {
            $vehicles_info = VehicleInfo::find($vehicles_info_id);
            $vehicles_info->update(['current_status' => $request->current_status]);
        }

        return redirect()->back();
    }
}
