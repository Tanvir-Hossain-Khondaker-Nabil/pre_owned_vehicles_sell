<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WorkShopController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\WashColorController;
use App\Http\Controllers\VehicleInfoController;
use App\Http\Controllers\VehicleModelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');

    Route::resources([
        'suppliers'     => SupplierController::class,
        'customers'     => CustomerController::class,
        'vehicles'      => VehicleController::class,
        'transport'     => TransportController::class,
        'vehiclemodels' => VehicleModelController::class,
        'washcolors'    => WashColorController::class,
        'workshops'     => WorkShopController::class,
        'vehicle-info'  => VehicleInfoController::class,
    ]);

    Route::prefix('vehicle')->as('vehicle.transport.')->controller(TransportController::class)->group(function () {
        Route::get('{vehicle_info}/transport/create', 'vehicleTransportCreate')->name('create');
        Route::post('{vehicle_info}/transport/store', 'vehicleTransportStore')->name('store');
        Route::get('{vehicle_info}/transport/edit', 'vehicleTransportEdit')->name('edit');
        Route::put('{vehicle_info}/transport/update', 'vehicleTransportUpdate')->name('update');
        Route::delete('{vehicle_info}/transport/destroy', 'vehicleTransportDestroy')->name('destroy');
        Route::get('{vehicle_info}/transport/workshop', 'vehicleTransportWorkshop')->name('workshop');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
