<?php

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
            $table->string('chassis_no');
            $table->string('engine_no');
            $table->string('color');
            $table->enum('current_status', ['transport', 'garage', 'workshop', 'wash_color'])->default('transport');
            $table->string('details')->nullable();
            $table->foreignIdFor(VehicleModel::class)->cascadeOnUpdate()->restrictOnDelete();
            $table->morphs('ownable');
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
