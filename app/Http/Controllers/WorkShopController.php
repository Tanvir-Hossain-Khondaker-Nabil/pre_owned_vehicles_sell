<?php

namespace App\Http\Controllers;

use App\Models\WorkShop;

use App\Models\VehicleInfo;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

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
        return view('workshop.create', compact('workshop'));
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

    public function vehicleWorkshopsIndex(): Factory|View
    {
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'workshop')->paginate(),
        ];
        return view('workshop_fee.list', $data);
    }

    public function vehicleWorkshopsCreate(VehicleInfo $vehicle_info): Factory|View
    {
        $data = [
            'vehiclesInfo' => $vehicle_info,
            'workshops'    => WorkShop::get(),
        ];
        return view('workshop_fee.create_edit', $data);
    }

    public function vehicleWorkshopsWashColor(VehicleInfo $vehicle_info): Factory|View
    {
        $vehicle_info->update([
            'current_status' => 'wash_color'
        ]);
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'workshop')->paginate(),
        ];
        return view('workshop_fee.list', $data);
    }
    public function vehicleWorkshopsStore(VehicleInfo $vehicle_info, Request $request): Factory|View
    {
        $request->validate([
            'workshop_id'   => 'required',
            'workshop_id.*' => 'required',
        ]);
        foreach ($request->workshop_id as $workshop_id) {
            if ($request->workshop_id[$workshop_id]) {
                $workshop = WorkShop::find($request->workshop_id[$workshop_id]);
                $vehicle_info->fees()->updateOrCreate(
                    [
                        'workable_id' => $workshop->id,
                    ],
                    [
                        'workable_id'   => $workshop->id,
                        'workable_type' => WorkShop::class,
                        'amount'        => $workshop->amount,
                        'details'       => $request->details[$workshop_id],
                    ]
                );
            }
        }
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'workshop')->paginate(),
        ];
        return view('workshop_fee.list', $data);
    }

    public function vehicleWorkshopsPaymentView(VehicleInfo $vehicle_info)
    {
        $data = [
            'vehiclesInfo' => $vehicle_info,
        ];
        return view('workshop_fee.show', $data);
    }

    public function vehicleWorkshopsDestroy(VehicleInfo $vehicle_info)
    {
        $vehicle_info->fees()
            ->where('workable_type', 'App\Models\WorkShop')
            ->delete();
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'fees', 'vehicleModel')
                ->where('current_status', 'workshop')->paginate(),
        ];
        return view('workshop_fee.list', $data);
    }
}
