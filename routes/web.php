<?php

use App\Http\Controllers\MemeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PeriksaController;
use Illuminate\Support\Facades\Route;

//Menu Utama

Route::get('/', function () {
    return view('layout.landing_page');
});

Route::get('/login', function () {
    return view('layout.login');
});

Route::get('/register', function () {
    return view('layout.register');
});

//Dokter

Route::get('/dokter/dashboard', function () {
    return view('dokter.index');
})->name('dokter.dashboard');

Route::get('/dokter/memeriksa', [MemeriksaController::class, 'index']);
Route::get('/dokter/memeriksa/{id}/create', [MemeriksaController::class, 'create']);
Route::post('/dokter/memeriksa', [MemeriksaController::class, 'store']);
Route::get('/dokter/memeriksa/{id}/edit', [MemeriksaController::class, 'edit']);
Route::put('/dokter/memeriksa/{id}', [MemeriksaController::class, 'update']);

Route::get('/dokter/obat', [ObatController::class, 'index']);
Route::get('/dokter/obat/create', [ObatController::class, 'create']);
Route::post('/dokter/obat', [ObatController::class, 'store']);
Route::get('/dokter/obat/{id}/edit', [ObatController::class, 'edit']);
Route::put('/dokter/obat/{id}', [ObatController::class, 'update']);
Route::delete('/dokter/obat/{id}', [ObatController::class, 'destroy']);

//Pasien

Route::get('/pasien/dashboard', function () {
    return view('pasien.index');
});

Route::get('/pasien/periksa', [PeriksaController::class, 'index']);
//Route::get('/pasien/periksa/create', [PeriksaController::class, 'create']);
Route::post('/pasien/periksa', [PeriksaController::class, 'store']);
