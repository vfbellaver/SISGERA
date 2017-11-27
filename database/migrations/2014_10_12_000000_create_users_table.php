<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('rg',12)->unique();
            $table->string('org_emissor',15)->nullable();
            $table->string('cpf',15)->unique();
            $table->string('telefone',24)->nullable();
            $table->string('celular',24)->nullable();
            $table->string('password')->nullable();
            $table->string('cadastro_token')->nullable();
            $table->boolean('status')->default(1);
            $table->rememberToken();

            $table->unsignedInteger('conta_id')->nullable();
            $table->foreign('conta_id')->references('id')
                        ->on('contas')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
