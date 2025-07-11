<?php

use App\Http\Controllers\Depositos\DepositosController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::post("deposito/create", [DepositosController::class, "create"])
        ->name("depositar");

    Route::get("deposito/byUser/show/all", [DepositosController::class, "show"])
        ->name("depositos.byUser");
});