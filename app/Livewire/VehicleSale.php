<?php

namespace App\Livewire;

use App\Models\Account;
use Livewire\Component;
use App\Models\Customer;
use App\Models\VehicleInfo;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Locked;

class VehicleSale extends Component
{

    #[Rule('required')]
    public $date;
    public $reference_no;
    #[Rule('required'), Rule('min:1')]
    public $amount;
    public $search = '';
    public $vehicles = [];
    public $discount_amount;
    public $discount_type = 'fixed';
    public $searchVehicleId = [];
    #[Locked]
    public $total;
    public $cartVehicles;
    public $shipping_cost;
    public $discount_cost;

    public function save()
    {
        dd($this->validate());
    }
    public function discountSet()
    {
        if ($this->discount_type === 'fixed') {
            $this->discount_cost = $this->discount_amount;
        } elseif ($this->discount_type === 'percentage') {
            $this->discount_cost = (($this->cartVehicles?->sum('buying_price') * $this->discount_amount) / 100);
        }
        $this->total = $this->cartVehicles?->sum('buying_price') - $this->discount_cost;
    }

    public function shippingCost()
    {
        $this->total = $this->cartVehicles?->sum('buying_price') - $this->discount_cost + $this->shipping_cost;
    }

    public function updated($name, $value)
    {
        if ($name === 'search') {
            $this->vehicles = VehicleInfo::where('serial_no', 'LIKE', "%{$value}%")
                ->get();
        }
    }

    public function addFromCart($vehicleId)
    {
        $this->searchVehicleId[] = $vehicleId;
        array_unique($this->searchVehicleId);
        $this->cartVehicles = VehicleInfo::find($this->searchVehicleId);
        $this->total        = $this->cartVehicles?->sum('buying_price');
    }
    public function removeFromCart($vehicleId)
    {
        if (($key = array_search($vehicleId, $this->searchVehicleId)) !== false) {
            unset($this->searchVehicleId[$key]);
        }
    }

    public function render()
    {
        $date = [
            'allCartVehicles' => $this->cartVehicles ?? [],
            'allTotal'        => $this->total,
            'accounts'        => [],
            // 'accounts' => Account::pluck('account_name', 'id'),
            'customers' => Customer::get(),
            'vehicles'        => $this->vehicles,
        ];
        return view('livewire.vehicle-sale', $date);
    }
}
