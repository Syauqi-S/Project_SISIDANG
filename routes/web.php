<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.app');
});

// Route::get('/users', [UserController::class,'index']);
// // add data
// Route::get('/users/adduser', [UserController::class,'create'])->name('user.add');
// Route::post('/users/create', [UserController::class,'store'])->name('user.create');
// // update data
// Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('user.edit');
// Route::post('/users/update/{id}', [UserController::class,'update'])->name('user.update');
// // delete data
// Route::post('/users/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::resource("users", UserController::class);

Route::resource("roles", RolesController::class);

Route::resource("jurusan", JurusanController::class);

Route::resource("jenjang", JenjangController::class);

Route::resource("prodi", ProdiController::class);

Route::resource("mahasiswa", MahasiswaController::class);

Route::get('get-prodi-jurusan/{jurusan_id}', [ProdiController::class, 'getProdiJurusan']);

Route::resource("dosen", DosenController::class);

Route::resource("kategori", KategoriController::class);