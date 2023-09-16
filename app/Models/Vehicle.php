<?php

namespace App\Models;
use App\Models\VehicleModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\HasMany;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'company_name',
        'company_logo',
        'type'
    ];

    use HasFactory;

    public function vehiclemodels(): HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }
}
