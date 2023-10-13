<?php

use App\Models\Color;
use App\Models\VehicleModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicle_infos', function (Blueprint $table) {
            $table->id();
            $table->enum('registration_status', ['Registered', 'On-Test'])->nullable();
            $table->enum('paper_status', ['Due', 'Provided'])->nullable();
            $table->boolean('bank_payment')->nullable();
            $table->string('key')->nullable();
            $table->boolean('service_book')->nullable();
            $table->float('buying_price', 8, 2)->nullable();
            $table->float('delivery_charge', 8, 2)->nullable();
            $table->float('selling_price', 8, 2)->def();
            $table->string('first_purchase_date')->nullable();
            $table->string('gate_pass_year')->nullable();
            $table->string('model_year')->nullable();
            $table->string('chassis_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('vehicle_photo')->nullable();
            $table->string('vehicle_doc')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('details')->nullable();
            $table->string('remark')->nullable();
            $table->enum('status', ['All-Clear', 'Processing'])->nullable();
            $table->foreignIdFor(Color::class)->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(VehicleModel::class)->cascadeOnUpdate()->restrictOnDelete();
            $table->morphs('ownable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_infos');
    }
};
