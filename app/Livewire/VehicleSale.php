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
    public $searchVehicleId = [];

    public function save()
    {
        dd($this->validate());
    }

    public function updated($name, $value)
    {
        if ($name === 'search') {
            $this->vehicles = VehicleInfo::where('serial_no', 'LIKE', "%{$value}%")
                ->get();
        }
    }

    public function addVehicle($vehicleId)
    {
        $this->searchVehicleId[] = $vehicleId;
    }

    public function render()
    {
        $date = [
            'cartVehicles' => VehicleInfo::find($this->searchVehicleId) ?? [],
            'accounts'     => [],
            // 'accounts' => Account::pluck('account_name', 'id'),
            'vehicles'     => $this->vehicles,
        ];
        return view('livewire.vehicle-sale', $date);
    }
}
