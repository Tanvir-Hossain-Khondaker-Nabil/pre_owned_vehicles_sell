<?php

namespace App\Livewire;

use App\Models\Account;
use Livewire\Component;
use App\Models\VehicleInfo;
use Livewire\Attributes\Rule;

class VehicleSale extends Component
{

    #[Rule('required')]
    public $date;
    public $reference_no;
    #[Rule('required'), Rule('min:1')]
    public $amount;
    public $search = '';
    public $vehicles = [];

    public function save()
    {
        dd($this->validate());
    }

    public function updated($name, $value)
    {
        if ($name === 'search') {
            $this->vehicles = VehicleInfo::where('chassis_no', 'LIKE', "%{$value}%")
                ->orWhere('engine_no', 'LIKE', "%{$value}%")
                ->orWhere('serial_no', 'LIKE', "%{$value}%")
                ->get();
        }
    }

    public function addVehicle($vehicleId)
    {
        dd($vehicleId);
    }

    public function render()
    {
        $date = [
            'accounts' => [],
            // 'accounts' => Account::pluck('account_name', 'id'),
            'vehicles' => $this->vehicles,
        ];
        return view('livewire.vehicle-sale', $date);
    }
}
