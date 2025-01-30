<?php

use Illuminate\Support\Facades\Route;



Route::get("/", [App\Http\Controllers\DuitController::class, "index"])
    ->name("duit.index");

Route::get("/duit/create", [App\Http\Controllers\DuitController::class, "create"])
    ->name("duit.create");

Route::post("/duit/store", [App\Http\Controllers\DuitController::class, "store"])
    ->name("duit.store");


Route::delete("/duit/delete/{id}", [App\Http\Controllers\DuitController::class, "destroy"])
    ->name("duit.destroy");
