<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimentoTipoRequerimentoTable extends Migration
{

    public function up()
    {
        Schema::create('requerimento_tipo_requerimento', function (Blueprint $table) {
            $table->unsignedInteger('requerimento_id');
            $table->unsignedInteger('tipo_requerimento_id');

            $table->foreign('requerimento_id')
                ->references('id')->on('requerimentos')
                ->onDelete('cascade');

            $table->foreign('tipo_requerimento_id')
                ->references('id')->on('tipo_requerimentos')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('requerimento_tipo_requerimento');
    }
}
