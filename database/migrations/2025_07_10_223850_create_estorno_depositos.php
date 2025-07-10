<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estorno_depositos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_deposito");
            $table->unsignedBigInteger("id_solicitacao");
            $table->foreign("id_deposito")->references("id")->on("depositos");
            $table->foreign("id_solicitacao")->references("id")->on("solicitacoes");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estorno_depositos');
    }
};
