<?php

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
            $table->boolean('transport')->default(true);
            $table->boolean('garage')->default(false);
            $table->boolean('workshop')->default(false);
            $table->boolean('wash_color')->default(false);
            $table->morphs('sellable');
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
