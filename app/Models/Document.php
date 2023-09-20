<?php

namespace App\Models;

use App\Models\VehicleInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    

    public function vehicleInfos(): BelongsToMany
    {
        return $this->belongsToMany(VehicleInfo::class, 'document_vehicle_info');
    }
}
