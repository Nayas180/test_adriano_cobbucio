<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get("users/show/all", [UserController::class, "index"]);
});