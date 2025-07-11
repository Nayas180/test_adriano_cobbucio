<?php

namespace Database\Seeders;

use App\Models\Solicitacoes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolicitacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Solicitacoes::factory()
                    ->count(4)
                    ->sequence(
                        ["solicitacao" => "Estorno Deposito"],
                        ["solicitacao" => "Estorno Transferencia"],
                        ["solicitacao" => "Problema na Transferencia"],
                        ["solicitacao" => "Problema no Deposito"]
                    )
                    ->create();
    }
}
