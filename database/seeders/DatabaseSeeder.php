<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\VehicleModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->count(1)->create();
        // Supplier::factory()->count(30)->create();
        // Customer::factory()->count(30)->create();
        Vehicle::factory()->has(VehicleModel::factory()->count(3))->count(3)->create();
    }
}
