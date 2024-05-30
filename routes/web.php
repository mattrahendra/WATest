<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Data;
use App\Http\Controllers\Pelanggan;
use App\Http\Controllers\Status;

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('status', [Status::class, 'index'])->name('status');
    Route::get('data', [Data::class, 'index'])->name('data');
    Route::get('user', [Pelanggan::class, 'index'])->name('pelanggan');
    Route::get('adduser', [Pelanggan::class, 'add'])->name('adduser');
    Route::get('edituser/{id}', [Pelanggan::class, 'edit'])->name('edituser');

    Route::post('/tambah/pelanggan', [Pelanggan::class, 'store'])->name('tambah.pelanggan');
    Route::post('/edit/pelanggan/{id}', [Pelanggan::class, 'update'])->name('edit.pelanggan');
    Route::post('/delete/pelanggan/{id}', [Pelanggan::class, 'delete'])->name('delete.pelanggan');

    Route::get('admin', [Admin::class, 'index'])->name('admin');
    Route::get('addadmin', [Admin::class, 'add'])->name('addadmin');
    Route::get('editadmin/{id}', [Admin::class, 'edit'])->name('editadmin');

    Route::post('/tambah/admin', [Admin::class, 'store'])->name('tambah.admin');
    Route::post('/edit/admin/{id}', [Admin::class, 'update'])->name('edit.admin');
    Route::post('/delete/admin/{id}', [Admin::class, 'delete'])->name('delete.admin');

});
Route::get('login', [Admin::class, 'showLogin'])->name('login');

Route::post('logina', [Admin::class, 'login'])->name('logina');
Route::post('logout', [Admin::class, 'logout'])->name('logout');