<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasTable extends Migration
{

    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('funcao',100);
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
