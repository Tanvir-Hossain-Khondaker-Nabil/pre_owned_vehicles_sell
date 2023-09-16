<?php

namespace App\Http\Controllers;

use App\Models\VehicleInfo;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    public function vehicleGarageIndex()
    {
        $data = [
            'vehiclesInfos' => VehicleInfo::with('ownable', 'vehicleModel')->where('current_status', 'garage')->paginate(),
        ];
        return view('garage.list', $data);
    }

    public function vehicleGaragePaymentView(VehicleInfo $vehicle_info)
    {
        $data = [
            'vehiclesInfo' => $vehicle_info,
        ];
        return view('garage.show', $data);
    }
}
