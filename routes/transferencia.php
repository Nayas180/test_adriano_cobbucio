<?php

use App\Http\Controllers\Transferencias\TransferenciasController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::post("transferir/create", [TransferenciasController::class, "create"])
        ->name("transferir");

    Route::get("transferencia/toUser/show/all", [TransferenciasController::class, "show_toUser"])
        ->name("transferencia.toUser");

    Route::get("transferencia/fromUser/show/all", [TransferenciasController::class, "show_fromUser"])
        ->name("transferencia.fromUser");
});