<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class VehicleInfo extends Model
{
    use HasFactory;

    protected $guards = [];

    public function sellable(): MorphTo
    {
        return $this->morphTo('sellable');
    }

    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class, 'document_vehicle_info');
    }
}
