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
            $table->string('nome_estudante',200);
            $table->string('periodo',20);
            $table->string('curso',50);
            $table->string('turma',10);
            $table->string('turno',20);
            $table->text('justificativa');
            $table->text('anexo_url')->nullable();
            $table->text('resposta')->nullable();
            $table->string('situacao',30)->default(Requerimento::ENVIADO);

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
                        ->on('users')->onDelete('cascade');

            $table->unsignedInteger('conta_id')->nullable();
            $table->foreign('conta_id')->references('id')
                ->on('contas')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('requerimentos');
    }
}
