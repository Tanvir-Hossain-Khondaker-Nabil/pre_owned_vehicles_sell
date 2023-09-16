<?php

namespace App\Models;

use App\Models\VehicleInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function workable(): MorphTo
    {
        return $this->morphTo('workable', 'workable_id', 'workable_type');
    }

    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleInfo::class);
    }

    public function feeTransport()
    {
        return $this->morphOne(Transport::class, 'workable');
    }
}
