<?php

use App\Models\Document;
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
        Schema::create('document_vehicle_info', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Document::class);
            $table->foreignIdFor(VehicleInfo::class);
            $table->string('path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_vehicle_info');
    }
};