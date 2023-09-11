<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInfo extends Model
{
    protected $fillable = [
        'chesis_no','engine_no','color','garage','workshop','wash_color'
    ];

    use HasFactory;
}
