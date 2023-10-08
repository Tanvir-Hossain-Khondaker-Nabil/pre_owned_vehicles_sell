<?php

use App\Utility;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->enum('leaser_name', [Utility::$leaser]);
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('debit', 9, 2)->default(0);
            $table->decimal('credit', 9, 2)->default(0);
            $table->text('note')->nullable();
            $table->string('transaction_num');
            $table->string('transaction_name');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->morphs('accountable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
