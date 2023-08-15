<?php

use App\Http\Controllers\CalculationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Models\Unit;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/', function () {
  return redirect()->route('auth.login');
});

Route::get('/login', function () {
  return view('auth.login');
})->name('auth.login');

Route::get('/dashboard', function () {
  return view('dashboard.index');
})->name('dashboard.index');

Route::prefix('master')->name('master.')->group(function () {
  Route::resource('/unit', UnitController::class)->except(['edit', 'update', 'destroy'])->names('unit');
  Route::resource('/type', TypeController::class)->except(['store', 'edit', 'update', 'destroy'])->names('type');
  Route::resource('/category', CategoryController::class)->except(['store', 'edit', 'update', 'destroy'])->names('category');
  Route::resource('/medicine', MedicineController::class)->except(['store', 'edit', 'update'])->names('medicine');
  Route::resource('/supplier', SupplierController::class)->except(['store', 'edit', 'update', 'destroy'])->names('supplier');
});

Route::prefix('calculation')->name('calculation.')->group(function () {
  Route::get('/eoq', [CalculationController::class, 'eoq'])->name('eoq');
  Route::get('/wma', [CalculationController::class, 'wma'])->name('wma');
});
