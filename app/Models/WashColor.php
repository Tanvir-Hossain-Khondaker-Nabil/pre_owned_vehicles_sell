<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashColor extends Model
{

    protected $fillable = [
        'work','amount'
    ];

    use HasFactory;
}
