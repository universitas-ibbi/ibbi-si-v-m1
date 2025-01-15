<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        "menus" => \App\Models\Menu::all(),
        "setting" => \App\Models\Setting::first()
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view("/about","about",[
    "setting" => \App\Models\Setting::first()
])->name("about");
Route::view("/contact","contact",[
    "setting" => \App\Models\Setting::first()
])->name("contact");


Route::middleware("auth")->group(function(){
    Route::get("/menu",[App\Http\Controllers\MenuController::class,"index"])
        ->name("menu.index");

    Route::post("/menu/simpan",[App\Http\Controllers\MenuController::class,"simpan"])
        ->name("menu.simpan");

    Route::get("/setting",[App\Http\Controllers\SettingController::class,"index"])
        ->name("setting.index");
    Route::post("/setting",[App\Http\Controllers\SettingController::class,"simpanSetting"])
        ->name("setting.simpan");
});


