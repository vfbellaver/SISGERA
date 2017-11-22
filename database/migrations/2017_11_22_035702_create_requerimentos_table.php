<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimentosTable extends Migration
{

    public function up()
    {
        Schema::create('requerimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_criacao');
            $table->dateTime('data_fechamento');
            $table->string('protocolo',10)->unique();
            $table->text('justificativa');
            $table->string('situacao',30)->default('Em andamento');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
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
