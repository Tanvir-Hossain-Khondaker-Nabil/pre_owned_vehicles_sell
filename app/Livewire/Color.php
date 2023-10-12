<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Color as ModelsColor;

class Color extends Component
{


    public $name;
    public $code;

    #[Rule([
        'name' => 'required',
        'code' => 'required',
    ])]
    public function save()
    {
        $color_data = [
            'name' => $this->name,
            'code' => $this->code,
        ];

        ModelsColor::create($color_data);
        $this->reset();
        $this->js('window.location.reload()');
    }
    public function render()
    {
        return view('livewire.color');
    }
}
