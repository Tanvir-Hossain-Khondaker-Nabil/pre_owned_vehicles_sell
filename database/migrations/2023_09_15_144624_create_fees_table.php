<?php

use App\Models\VehicleInfo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(VehicleInfo::class)->cascadeOnUpdate()->restrictOnDelete();
            $table->string('workable_type')->nullable();
            $table->integer('workable_id')->unsigned()->nullable();
            $table->float('amount', 8, 2);
            $table->string('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
