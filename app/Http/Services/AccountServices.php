<?php

namespace App\Http\Services;

use App\Http\Requests\TransferenciaRequest;
use App\Models\{Depositos, EstornoDepositos, EstornoTransferencias, Transferencias};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountServices {

    /**
     * retorna o valor total em conta do usuario logado;
     *
     * @return float
     */
    public static function getAccountAmount() : float {
        $amount = 0;
        $depositos = Depositos::all()->where("id_user", Auth::id())->toArray();
        $transferencias_made = Transferencias::all()->where("id_user_from", Auth::id())->toArray();
        $transferencias_received = Transferencias::all()->where("id_user_to", Auth::id())->toArray();

        foreach ($depositos as $deposito) {
            $amount += $deposito["value"];
        }

        foreach ($transferencias_received as $received) {
            $amount += $received["value"];
        }
        
        foreach ($transferencias_made as $made) {
            $amount -= $made["value"];
        }

        return $amount + self::getEstornoAmount();
    }

    /**
     * retorna os valores estornado do usuario;
     *
     * @return float
     */
    public static function getEstornoAmount() : float
    {
        $valor_estornado = 0;
        $id_user = Auth::id();
        $estorno_depositos = DB::table("estorno_depositos")
                               ->join("depositos", "estorno_depositos.id_deposito", "=", "depositos.id")
                               ->where("depositos.id_user", $id_user)
                               ->get()
                               ->toArray();
        $estorno_transferencias = DB::table("estorno_transferencias")
                                    ->join("transferencias", "id_transferencia", "=", "transferencias.id")
                                    ->where("transferencias.id_user_to", $id_user)
                                    ->get()
                                    ->toArray();

        foreach ($estorno_depositos as $deposito) {
            $valor_estornado += $deposito->value;
        }

        foreach ($estorno_transferencias as $transferencia) {
            $valor_estornado += $transferencia->value;
        }

        return $valor_estornado;
    }

    /**
     * Efetua a transferencia para outro usuario
     *
     * @param TransferenciaRequest $request
     * @return boolean
     */
    public static function setTransferencia(TransferenciaRequest $request) : bool
    {
        $id_user = Auth::id();
        $value_to_transfer = $request->get("value");

        if (
            $value_to_transfer > self::getAccountAmount()
            || $request->get("id_user_to") == $id_user
        ) {
            return false;
        }

        return Transferencias::create([
            "id_user_from" => $id_user,
            "id_user_to" => $request->get("id_user_to"),
            "value" => $value_to_transfer
        ]);
    }
}