<?php

namespace App\Models;

use App\Models\VehicleInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $guards = [];

    public function vehicleInfo()
    {
        return $this->morphOne(VehicleInfo::class, 'sellable');
    }
}
