<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::middleware("auth")->group(function(){
    Route::get('cek', function(){
        dd(Auth::user()->role->name);
    });
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pengajar', 'PengajarController')->middleware('CheckRole:Superadmin,Karyawan');
    Route::resource('/siswa', 'SiswaController')->middleware('CheckRole:Pengajar,Karyawan,Superadmin');
    Route::resource('/nilai_siswa', 'NilaiSiswaController')->middleware('CheckRole:Pengajar,Karyawan,Superadmin');
    Route::resource('/pembayaran_siswa', 'PembayaranSiswaController')->middleware('CheckRole:Karyawan,Superadmin');
    Route::resource('/users', 'UserController')->middleware('CheckRole:Superadmin');
});

