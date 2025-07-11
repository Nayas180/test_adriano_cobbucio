<?php

namespace Database\Seeders;

use App\Models\Solicitacoes;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
