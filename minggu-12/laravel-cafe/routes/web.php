<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        "menus" => \App\Models\Menu::all()
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view("/about","about")->name("about");
Route::view("/contact","contact")->name("contact");


Route::middleware("auth")->group(function(){
    Route::get("/menu",[App\Http\Controllers\MenuController::class,"index"])
        ->name("menu.index");

    Route::post("/menu/simpan",[App\Http\Controllers\MenuController::class,"simpan"])
        ->name("menu.simpan");
});
