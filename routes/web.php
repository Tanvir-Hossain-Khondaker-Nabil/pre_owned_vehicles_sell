<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\AccountController;
<<<<<<< HEAD
use App\Http\Controllers\ExpenseController;
=======
>>>>>>> b3b4240afc6e36ac47d9ded5491d410911101021
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WorkShopController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\WashColorController;
use App\Http\Controllers\VehicleInfoController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\VehicleDocumentController;


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
        'accounts'      => AccountController::class,
        'expenses'      => ExpenseController::class,
        'expense-categories'      => ExpenseCategoryController::class,

    ]);

    Route::post('vehicle-info/status/change', [VehicleInfoController::class, 'bulkStatusChange'])->name('bulk.status.change');

    Route::prefix('vehicle')->as('vehicle.transport.')->controller(TransportController::class)->group(function () {
        Route::get('{vehicle_info}/transport/create', 'vehicleTransportCreate')->name('create');
        Route::post('{vehicle_info}/transport/store', 'vehicleTransportStore')->name('store');
        Route::get('{vehicle_info}/transport/edit', 'vehicleTransportEdit')->name('edit');
        Route::put('{vehicle_info}/transport/update', 'vehicleTransportUpdate')->name('update');
        Route::delete('{vehicle_info}/transport/destroy', 'vehicleTransportDestroy')->name('destroy');
        Route::get('{vehicle_info}/transport/workshop', 'vehicleTransportWorkshop')->name('workshop');
    });


    Route::prefix('vehicle')->as('vehicle.workshop.')->controller(WorkShopController::class)->group(function () {
        Route::get('workshops/index', 'vehicleWorkshopsIndex')->name('index');
        Route::get('{vehicle_info}/workshops/create', 'vehicleWorkshopsCreate')->name('create');
        Route::get('{vehicle_info}/workshops/payment-view', 'vehicleWorkshopsPaymentView')->name('payment.view');
        Route::post('{vehicle_info}/workshops/store', 'vehicleWorkshopsStore')->name('store');
        Route::get('{vehicle_info}/workshops/edit', 'vehicleWorkshopsEdit')->name('edit');
        Route::put('{vehicle_info}/workshops/update', 'vehicleWorkshopsUpdate')->name('update');
        Route::delete('{vehicle_info}/workshops/destroy', 'vehicleWorkshopsDestroy')->name('destroy');
        Route::get('{vehicle_info}/workshops/wash-color', 'vehicleWorkshopsWashColor')->name('wash.color');
    });

    Route::prefix('vehicle')->as('vehicle.wash.color.')->controller(WashColorController::class)->group(function () {
        Route::get('wash-colors/index', 'vehicleWashColorsIndex')->name('index');
        Route::get('{vehicle_info}/wash-colors/create', 'vehicleWashColorsCreate')->name('create');
        Route::get('{vehicle_info}/wash-colors/payment-view', 'vehicleWashColorsPaymentView')->name('payment.view');
        Route::post('{vehicle_info}/wash-colors/store', 'vehicleWashColorsStore')->name('store');
        Route::get('{vehicle_info}/wash-colors/edit', 'vehicleWashColorsEdit')->name('edit');
        Route::put('{vehicle_info}/wash-colors/update', 'vehicleWashColorsUpdate')->name('update');
        Route::delete('{vehicle_info}/wash-colors/destroy', 'vehicleWashColorsDestroy')->name('destroy');
        Route::get('{vehicle_info}/wash-colors/garage', 'vehicleWashColorsGarage')->name('garage');
    });

    Route::prefix('vehicle')->as('vehicle.garage.')->controller(GarageController::class)->group(function () {
        Route::get('garage/index', 'vehicleGarageIndex')->name('index');
        Route::get('{vehicle_info}/garage/payment-view', 'vehicleGaragePaymentView')->name('payment.view');
    });

    Route::prefix('vehicle')->as('vehicle.document.')->controller(DocumentController::class)->group(function () {
        Route::get('{vehicle_info}/document/create', 'documentCreate')->name('create');
        Route::post('{vehicle_info}/document/store', 'vehicleDocumentStore')->name('store');
        Route::get('{vehicle_info}/document/view', 'documentView')->name('view');
    });

    // vehicle documents
    Route::get('/vehicledoc/create', [VehicleDocumentController::class, 'create'])->name('vehicledoc.create');
    Route::put('/vehicledoc/create', [VehicleDocumentController::class, 'store'])->name('vehicledoc.store');
    Route::get('/vehicledoc/list', [VehicleDocumentController::class, 'list'])->name('vehicledoc.list');
    Route::get('/vehicledoc/edit/{id}', [VehicleDocumentController::class, 'edit'])->name('vehicledoc.edit');
    Route::post('/vehicledoc/update/{id}', [VehicleDocumentController::class, 'update'])->name('vehicledoc.update');
    Route::delete('/vehicledoc/destroy/{id}', [VehicleDocumentController::class, 'destroy'])->name('vehicledoc.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';