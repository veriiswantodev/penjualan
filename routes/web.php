<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/barang', function () {
    return view('barang.index');
});
Route::get('/kategori', function () {
    return view('kategori.index');
});
Route::get('/suplier', function () {
    return view('suplier.index');
});
Route::get('/pembeli', function () {
    return view('pembeli.index');
});
Route::get('/pembelian', function () {
    return view('pembelian.index');
});
Route::get('/penjualan', function () {
    return view('penjualan.index');
});