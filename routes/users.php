<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get("users/show/all", [UserController::class, "index"]);
    Route::get("users/show/accountMount", [UserController::class, "show_accountAmount"])
           ->name("user.accountAmount");
});