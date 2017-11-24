<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Sisgera\Models\Requerimento;

class CreateHistoricoRequerimentoTable extends Migration
{

    public function up()
    {
        Schema::create('historico_requerimento', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_movimentacao');
            $table->string('movimentacao')->default(Requerimento::ENVIADO);

            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')
                        ->on('users')->onDelete('cascade');

            $table->unsignedInteger('requerimento_id');
            $table->foreign('requerimento_id')->references('id')
                ->on('requerimentos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('historico_requerimento');
    }
}
