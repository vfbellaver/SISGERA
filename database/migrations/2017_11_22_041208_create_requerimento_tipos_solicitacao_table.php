<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimentoTiposSolicitacaoTable extends Migration
{

    public function up()
    {
        Schema::create('requerimento_tipos_solicitacao', function (Blueprint $table) {
            $table->unsignedInteger('requerimento_id');
            $table->unsignedInteger('tipos_solicitacao_id');

            $table->foreign('requerimento_id')
                ->references('id')->on('requerimentos')
                ->onDelete('cascade');

            $table->foreign('tipos_solicitacao_id')
                ->references('id')->on('tipos_solicitacao')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('requerimento_tipos_solicitacao');
    }
}
