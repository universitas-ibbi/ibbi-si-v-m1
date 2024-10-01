<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// http://localhost:8000/about
Route::get("/about", function () {
    return "Ini halaman about";
});

// http://localhost:8000/contact
Route::get("/contact", function () {
    return "Ini no telpon saya 08123456789";
});
