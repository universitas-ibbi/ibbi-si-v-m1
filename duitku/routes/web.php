<?php

use App\Http\Controllers\DuitController;
use Illuminate\Support\Facades\Route;

Route::get("/", [DuitController::class, "index"]);
