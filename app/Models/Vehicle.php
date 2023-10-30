<?php

namespace App\Models;

use App\Models\VehicleInfo;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_logo',
        'type'
    ];


    public function vehicleModels(): HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }
    public function vehicleInfo(): HasManyThrough
    {
        return $this->hasManyThrough(VehicleInfo::class, VehicleModel::class);
    }
}
