<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // DB::unprepared('
        // CREATE TRIGGER id_store BEFORE INSERT ON money_transfers FOR EACH ROW
        //     BEGIN 
        //         INSERT INTO sequence_tbls VALUES (NULL);
        //         SET NEW.reference_no = CONCAT("ACC-", LPAD(LAST_INSERT_ID(, 8, "0"));
        //     END    
        
        // ');



        // Schema::create('generate_reference_nos', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     DB::unprepared('DROP TRIGGER "id_store"');
    // }
};

