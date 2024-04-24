<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
    return redirect('/nilai-mahasiswa');
});
Route::resource('nilai-mahasiswa', DashboardController::class);
Route::delete('/manual-delete/{nim}/{kode_mk}', [DashboardController::class, 'manualDelete'])->name('manual-delete');
