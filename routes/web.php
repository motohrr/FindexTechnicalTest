<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* Public pages */
Route::get("/", [HomepageController::class, 'index'])->name("homepage");
Route::get("/users", [UserController::class, 'index'])->name("users");
