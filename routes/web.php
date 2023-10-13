<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\VehicleInfoController;
use App\Http\Controllers\BalanceSheetController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\VehicleDocumentController;
use App\Http\Controllers\AccountStatementController;


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
        'suppliers'          => SupplierController::class,
        'customers'          => CustomerController::class,
        'vehicles'           => VehicleController::class,
        'vehicle-models'     => VehicleModelController::class,
        'colors'             => ColorController::class,
        'vehicle-info'       => VehicleInfoController::class,
        'accounts'           => AccountController::class,
        'expenses'           => ExpenseController::class,
        'sells'              => SellController::class,
        'expense-categories' => ExpenseCategoryController::class,

    ]);
    Route::get('balance-sheet', [BalanceSheetController::class, 'index']);
    Route::get('account-statement', [AccountStatementController::class, 'index']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
