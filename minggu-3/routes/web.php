<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get("/produk", function () {
//     return view("produk.index");
// });
Route::get("/produk", [ProdukController::class, "index"]);

// Route::get("/produk/form", function () {
//     // return "Ini Halaman Form Produk";
//     return view("produk.form");
// });
Route::get("/produk/form", [ProdukController::class, "form"]);

// Route::get("/sales", function () {
//     // return "Ini halaman sales";
//     return view("sales.index");
// });
Route::get("/sales", [SalesController::class, "index"]);
