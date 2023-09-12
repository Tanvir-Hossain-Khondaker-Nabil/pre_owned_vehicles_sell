<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleInfo extends Model
{
    use HasFactory;

    protected $guards = [];

    public function sellable(): MorphTo
    {
        return $this->morphTo('sellable');
    }
}
