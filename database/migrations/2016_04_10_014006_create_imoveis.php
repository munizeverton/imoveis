<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateImoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function(Blueprint $table){
            $table->increments('id');
            $table->float('valor_aluguel');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('estado');
            $table->text('descricao');
            $table->string('url_imagem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('imoveis');
    }
}