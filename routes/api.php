<?php

use App\Http\Controllers\PerkuliahanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('perkuliahan', PerkuliahanController::class)->except(
    ['update', 'destroy']
);
Route::put('/perkuliahan/{nim}/{kode_mk}', [PerkuliahanController::class, 'update'])->name('nilai-mahasiswa.update');
Route::delete('/perkuliahan/{nim}/{kode_mk}', [PerkuliahanController::class, 'destroy'])->name('nilai-mahasiswa.destroy');
