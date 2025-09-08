<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\BankSampahController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\UserController;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Vaksin;

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
Route::get('/', [PagesController::class, 'home'])->name('home');



Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    // Route::get('/login', 'login')->name('login');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});

Route::resource('provinsi', ProvinsiController::class)->middleware('auth');
Route::resource('kota', KotaController::class)->middleware('auth');
Route::resource('kecamatan', KecamatanController::class)->middleware('auth');
Route::resource('jenis_sampah', JenisSampahController::class)->middleware('auth');
Route::resource('bank_sampah', BankSampahController::class)->middleware('auth');
Route::resource('sampah', SampahController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');


Route::get('/data/{id_prov}/kota',  function($id_prov) {
    $kotas = Kota::where('provinsi_id', $id_prov)->get();

    return view('bank_sampah.select-kotas', compact('kotas'));
})->name('data.kota');

Route::get('/data/{id_kota}/kecamatan',  function($id_kota) {
    $kecamatans = Kecamatan::where('kota_id', $id_kota)->get();

    return view('bank_sampah.select-kecamatans', compact('kecamatans'));
})->name('data.kecamatan');
