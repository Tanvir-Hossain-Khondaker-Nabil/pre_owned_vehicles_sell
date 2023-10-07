<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('reference')->nullable();
            $table->foreignIdFor(Customer::class)->cascadeOnUpdate()->restrictOnDelete();
            $table->float('amount', 8, 2);
            $table->enum('pay_type', ['card', 'cash','draft'])->default('cash');
            $table->integer('total_item');
            $table->float('payment_amount', 8, 2);
            $table->float('discount_amount', 8, 2)->nullable;
            $table->float('total', 8, 2);
            $table->float('grand_total', 8, 2);
            $table->float('shipping', 8, 2)->nullable;
            $table->string('sale_note')->nullable;
            $table->string('payment_note')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
