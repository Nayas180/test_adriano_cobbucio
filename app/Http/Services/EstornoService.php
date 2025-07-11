<?php

namespace App\Http\Services;

use App\Models\{EstornoTransferencias, EstornoDepositos};

class EstornoService 
{   
    /**
     * Metodo processa a solicitacao de estorno efetuada por transferencia do usuario
     *
     * @param integer $id_transferencia
     * @param integer $id_solicitacao
     * 
     * @return void
     */
    public static function processEstornoTransferencia(
        int $id_transferencia,
        int $id_solicitacao
    ) 
    {
        EstornoTransferencias::create([
            "id_transferencia" => $id_transferencia,
            "id_solicitacao" => $id_solicitacao
        ]);
    }

    /**
     * Metodo processa a solicitacao de estorno feito por deposito, do usuario
     *
     * @param integer $id_deposito
     * @param integer $id_solicitacao
     * 
     * @return void
     */
    public static function processEstornoDeposito(
        int $id_deposito,
        int $id_solicitacao
    )
    {
        dd("AAA");
        EstornoDepositos::create([
            "id_deposito" => $id_deposito,
            "id_solicitacao" => $id_solicitacao
        ]);
    }
}