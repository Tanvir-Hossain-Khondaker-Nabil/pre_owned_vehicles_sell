<?php

namespace App\Livewire;

use App\Models\Account;
use App\Models\Service;
use App\Models\Vehicle;
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
    public $showVehicles = [];
    public $showServices = [];
    public $vehiclesOrService = [];
    public $discount_amount;
    public $discount_type = 'fixed';
    public $searchVehicleId = [];
    public $searchServicesId = [];
    #[Locked]
    public $total;
    public $cartVehicles;
    public $cartServices;
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
        $this->searchVehicleId   = array_unique($this->searchVehicleId);
        $this->cartVehicles      = VehicleInfo::find($this->searchVehicleId);
        $this->cartServices      = Service::find($this->searchServicesId);
        $this->total             = $this->cartVehicles?->sum('buying_price') + $this->cartServices?->sum('price');
    }


    public function removeFromCart($vehicleId)
    {
        if (($key = array_search($vehicleId, $this->searchVehicleId)) !== false) {
            unset($this->searchVehicleId[$key]);
        }
        $this->cartVehicles = VehicleInfo::find($this->searchVehicleId);
        $this->cartServices = Service::find($this->searchServicesId);
        $this->total        = $this->cartVehicles?->sum('buying_price') + $this->cartServices?->sum('price');
    }
    public function removeServiceFromCart($serviceId)
    {
        if (($key = array_search($serviceId, $this->searchServicesId)) !== false) {
            unset($this->searchServicesId[$key]);
        }
        $this->cartServices = Service::find($this->searchServicesId);
        $this->cartVehicles = VehicleInfo::find($this->searchVehicleId);
        $this->total        = $this->cartServices?->sum('price') + $this->cartVehicles?->sum('buying_price');
    }


    public function findVehicle($categoryId)
    {
        $this->showVehicles = Vehicle::find($categoryId)->vehicleInfo;
        $this->showServices = null;
    }

    public function showAllServices()
    {
        $this->showServices = Service::get();
        $this->showVehicles = null;
    }

    public function addServiceFromCart($serviceId)
    {
        $this->searchServicesId[] = $serviceId;
        $this->searchServicesId   = array_unique($this->searchServicesId);
        $this->cartServices       = Service::find($this->searchServicesId);
        $this->cartVehicles       = VehicleInfo::find($this->searchVehicleId);
        $this->total              = $this->cartVehicles?->sum('buying_price') + $this->cartServices?->sum('price');
    }

    public function render()
    {
        $date = [
            'allCartVehicles' => $this->cartVehicles ?? [],
            'allCartServices' => $this->cartServices ?? [],
            'allTotal'        => $this->total,
            'accounts'        => [],
            // 'accounts' => Account::pluck('account_name', 'id'),
            'customers'       => Customer::get(),
            'vehicles'        => $this->vehicles,
            'categories'      => Vehicle::get(),
        ];
        return view('livewire.vehicle-sale', $date);
    }
}
