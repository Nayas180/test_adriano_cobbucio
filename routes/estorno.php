<?php

use App\Http\Controllers\Estorno\{EstornoTransferenciaController, EstornoDepositoController};
use Illuminate\Support\Facades\Route;

Route::prefix("estorno")->middleware('web')->group(function () {
    Route::post("/transferencia", [EstornoTransferenciaController::class, "create"])->name("estorno.transferencia");
    Route::post("/deposito", [EstornoDepositoController::class, "create"])->name("estorno.deposito");
});