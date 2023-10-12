<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Supplier as ModelsSupplier;

class Supplier extends Component
{

    public $name;
    public $avatar;
    public $email;
    public $nid;
    public $phone_1;
    public $phone_2;
    public $driving_license_no;
    public $address;

    #[Rule([
        'avatar'             => 'image|max:1024',
        'name'               => 'required',
        'email'              => 'required',
        'nid'                => 'required',
        'phone_1'            => 'required',
        'phone_2'            => 'required',
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
        $supplier_data = [
            'avatar'             => null,
            'name'               => $this->name,
            'email'              => $this->email,
            'nid'                => $this->nid,
            'phone_1'            => $this->phone_1,
            'phone_2'            => $this->phone_2,
            'driving_license_no' => $this->driving_license_no,
            'address'            => $this->address,
        ];

        ModelsSupplier::create($supplier_data);
        $this->reset();
        $this->js('window.location.reload()');
    }
    public function render()
    {
        return view('livewire.supplier');
    }
}
