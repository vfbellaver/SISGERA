<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Sisgera\Models\Requerimento;

class CreateRequerimentosTable extends Migration
{

    public function up()
    {
        Schema::create('requerimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_criacao');
            $table->dateTime('data_fechamento')->nullable();
            $table->string('protocolo',15)->unique();
            $table->text('justificativa');
            $table->text('resposta')->nullable();
            $table->string('situacao',30)->default(Requerimento::ENVIADO);

            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')
                        ->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('requerimentos');
    }
}
