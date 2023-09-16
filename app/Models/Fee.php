<?php

namespace App\Models;

use App\Models\VehicleInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleInfo::class);
    }

    public function feeTransport()
    {
        dd(342);
        return $this->morphOne(Transport::class, 'workable');
    }
}
