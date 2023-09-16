<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class VehicleInfo extends Model
{
    use HasFactory;

    protected $guarded = [
        'supplier_id',
        'customer_id'
    ];

    public function ownable(): MorphTo
    {
        return $this->morphTo('ownable');
    }

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class, 'document_vehicle_info');
    }

    public function vehicleModel(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }
}
