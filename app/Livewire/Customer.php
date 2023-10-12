<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\Customer as CustomerModel;

class Customer extends Component
{

    use WithFileUploads;
    public $name;
    public $avatar;
    public $email;
    public $nid;
    public $phone;
    public $driving_license_no;
    public $address;

    #[Rule([
        'avatar'             => 'image|max:1024',
        'name'               => 'required',
        'email'              => 'required',
        'nid'                => 'required',
        'phone'              => 'required',
        'driving_license_no' => 'required',
        'address'            => 'required',
    ])]
    public function save()
    {
        // $file = $this->avatar;
        // if ($file) {
        //     $imageName = time() . '-customer' . '.' . $file->getClientOriginalExtension();
        //     $imageName = $this->avatar->store('upload/customer/' . $imageName, 'public');
        // }
        $customer_data = [
            'avatar'             => null,
            'name'               => $this->name,
            'email'              => $this->email,
            'nid'                => $this->nid,
            'phone'              => $this->phone,
            'driving_license_no' => $this->driving_license_no,
            'address'            => $this->address,
        ];

        CustomerModel::create($customer_data);
        $this->reset();
        $this->js('window.location.reload()');
    }
    public function render()
    {
        return view('livewire.customer');
    }
}
