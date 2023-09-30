<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;
      protected $guarded = [];


    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function expense_category(){
        return $this->belongsTo(ExpenseCategory::class);
    }
}