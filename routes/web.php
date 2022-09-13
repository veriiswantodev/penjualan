<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    KategoriController,
    BarangController,
    SuplierController,
    DashboardController,
    PembeliController,
    PembelianController
};

Route::get('/', [DashboardController::class, 'index']);

// Route Barang
Route::resource('/barang', BarangController::class);
Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
Route::get('/barang/{id}/hapus', [BarangController::class, 'destroy']);

// Route Kategori
Route::resource('/kategori', KategoriController::class);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'destroy']);

// Route Suplier
Route::resource('/suplier', SuplierController::class);
Route::get('/suplier/hapus/{id}', [SuplierController::class, 'destroy']);
Route::get('/suplier/edit/{id}', [SuplierController::class, 'edit']);

// Route Pembeli
Route::resource('/pembeli', PembeliController::class);
Route::get('/pembeli/hapus/{id}', [PembeliController::class, 'destroy']);
Route::get('/pembeli/edit/{id}', [PembeliController::class, 'edit']);

// Route Pembelian
Route::resource('/pembelian', PembelianController::class);
Route::get('/pembelian/hapus/{id}', [PembelianController::class, 'destroy']);
Route::get('/pembelian/edit/{id}', [PembelianController::class, 'edit']);

Route::get('/penjualan', function () {
    return view('penjualan.index');
});