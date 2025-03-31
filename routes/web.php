<?php

use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.landing_page');
});

Route::get('/login', function () {
    return view('layout.login');
});

Route::get('/register', function () {
    return view('layout.register');
});

Route::get('/dokter/dashboard', function () {
    return view('dokter.index');
})->name('dokter.dashboard');

Route::get('/dokter/memeriksa', function () {
    return view('dokter.memeriksa');
});

//Jika langsung view
/*Route::get('/dokter/obat', function () {
    return view('dokter.obat');
});*/

//Jika menggunakan controller
Route::get('/dokter/obat', [ObatController::class, 'index']);

Route::get('/pasien/dashboard', function () {
    return view('pasien.index');
});

Route::get('/pasien/periksa', function () {
    return view('pasien.periksa');
});
