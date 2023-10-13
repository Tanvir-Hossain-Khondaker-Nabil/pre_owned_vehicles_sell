<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sell extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
