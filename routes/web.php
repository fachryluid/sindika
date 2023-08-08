<?php

use App\Http\Controllers\UnitController;
use App\Models\Unit;
use Illuminate\Support\Facades\Route;

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
  Route::resource('/unit', UnitController::class)->except(['store', 'edit', 'update', 'destroy'])->names('unit');
});
