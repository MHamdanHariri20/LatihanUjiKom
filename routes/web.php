<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;

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

Route::get('/home', [userController::class, 'home'])->name('home');

Route::middleware(['isGuest'])->group(function () {
    Route::get('/login', [userController::class, 'login'])->name('login');
    Route::post('/login/auth', [userController::class, 'loginAuth'])->name('login.auth');
    Route::get('/register', [userController::class, 'register'])->name('register');
    Route::post('register/auth', [userController::class, 'registerAuth'])->name('register.auth');
});

Route::middleware(['isLogin'])->group(function () {
    Route::get('/dashboard', [adminController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [userController::class, 'logout'])->name('logout');

    // produk
    Route::get('/stok', [adminController::class, 'stok'])->name('stok');
    Route::get('/pendataan', [adminController::class, 'pendataan'])->name('pendataan');
    Route::post('/tambah-stok', [adminController::class, 'tambahStok'])->name('tambah.stok');
    Route::get('/edit-stok/{id}', [adminController::class, 'editStok'])->name('edit.stok');
    Route::put('/edit/{id}', [adminController::class, 'edit'])->name('edit');
    Route::delete('/delete-stok/{id}', [adminController::class, 'deleteStok'])->name('delete.stok');

    // pelanggan
    Route::get('/data-pelanggan', [adminController::class, 'dataPelanggan'])->name('data.pelanggan');
    Route::get('/tambah-pelanggan', [adminController::class, 'tambahPelanggan'])->name('tambah.pelanggan');
    Route::post('/tambah-pelanggan/tambah', [adminController::class, 'tambahPelanggandata'])->name('tambah.pelanggan.data');
    Route::delete('/delete-pelanggan/{id}', [adminController::class, 'deletePelanggan'])->name('delete.pelanggan');

});
