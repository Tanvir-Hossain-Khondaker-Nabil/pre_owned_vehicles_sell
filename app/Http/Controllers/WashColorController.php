<?php

namespace App\Http\Controllers;

use App\Models\WashColor;

use App\Models\VehicleInfo;
use Illuminate\Http\Request;

class WashColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'washcolors' => WashColor::paginate(),
        ];
        return view('washcolor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $washcolor_data = $request->all();

        WashColor::create($washcolor_data);
        session()->put('success', 'Item created successfully.');
        return redirect()->route('washcolors.create');
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
        $edit = '';
        $data = [
            'washcolors' => WashColor::paginate(),
        ];
        return view('washcolor.create', compact('washcolor', 'edit'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, washcolor $washcolor)
    {
        $washcolor_data = $request->all();

        $washcolor->update($washcolor_data);

        session()->put('success', 'Item Updated successfully.');

        return redirect()->route('washcolors.create');
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

    public function vehicleWashColorsIndex()
    {
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'wash_color')->paginate(),
        ];
        return view('wash_colors_fee.list', $data);
    }

    public function vehicleWashColorsPaymentView(VehicleInfo $vehicle_info)
    {
        $data = [
            'vehiclesInfo' => $vehicle_info,
        ];
        return view('wash_colors_fee.show', $data);
    }
    public function vehicleWashColorsCreate(VehicleInfo $vehicle_info)
    {
        $data = [
            'vehiclesInfo' => $vehicle_info,
            'washOrColors' => WashColor::get(),
        ];
        return view('wash_colors_fee.create_edit', $data);
    }
    public function vehicleWashColorsStore(VehicleInfo $vehicle_info, Request $request)
    {
        $request->validate([
            'washOrColor_id'   => 'required',
            'washOrColor_id.*' => 'required',
        ]);
        foreach ($request->washOrColor_id as $key => $washOrColor) {
            if ($request->washOrColor_id[$washOrColor]) {
                $washColor = WashColor::find($key);
                $vehicle_info->fees()->updateOrCreate(
                    [
                        'workable_id' => $washColor->id,
                    ],
                    [
                        'workable_id'   => $washColor->id,
                        'workable_type' => WashColor::class,
                        'amount'        => $washColor->amount,
                        'details'       => $request->details[$washOrColor],
                    ]
                );
            }
        }
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'wash_color')->paginate(),
        ];
        return view('wash_colors_fee.list', $data);
    }
    public function vehicleWashColorsEdit(VehicleInfo $vehicle_info)
    {
    }
    public function vehicleWashColorsUpdate(VehicleInfo $vehicle_info)
    {
    }
    public function vehicleWashColorsDestroy(VehicleInfo $vehicle_info)
    {
        $vehicle_info->fees()
            ->where('workable_type', 'App\Models\WashColor')
            ->delete();
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'fees', 'vehicleModel')
                ->where('current_status', 'wash_color')->paginate(),
        ];
        return view('wash_colors_fee.list', $data);
    }
    public function vehicleWashColorsGarage(VehicleInfo $vehicle_info)
    {
        $vehicle_info->update([
            'current_status' => 'garage'
        ]);
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'wash_color')->paginate(),
        ];
        return view('wash_colors_fee.list', $data);
    }
}
