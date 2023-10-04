<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyTransfer extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'reference_no', 'from_account', 'to_account', 'accounts_bl'];
}
