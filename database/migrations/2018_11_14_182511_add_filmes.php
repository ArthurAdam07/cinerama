<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilmes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filmes', function (Blueprint $table) {
            $table->increments('id');           //código identificador
            $table->string('title');            //título do filme
            $table->string('synopsis');      //sinopse da filme
            $table->dateTime('scheduledto');    //lançamento
            $table->integer('note');         //guarda o id de quem cadastra a ativ.
            $table->string('datasheet');     //ficha técnica
            $table->timestamps();               //registro created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filmes', function (Blueprint $table) {
            //
        });
    }
}
