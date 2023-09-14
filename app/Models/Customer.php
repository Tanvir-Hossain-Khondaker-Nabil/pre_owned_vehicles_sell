<?php

namespace App\Models;

use App\Models\VehicleInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;


    protected $guarded = [];  

    public function vehicleInfo()
    {
        return $this->morphOne(VehicleInfo::class, 'sellable');
    }
}