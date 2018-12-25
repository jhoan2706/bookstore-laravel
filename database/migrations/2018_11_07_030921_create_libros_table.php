<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('resumen');
            $table->integer('n_paginas');
            $table->float('precio', 8, 2);
            $table->date('fecha_publicacion');
            $table->integer('categoria_id')->unsigned;
            $table->integer('editorial_id')->unsigned;
            $table->integer('libreria_id')->unsigned;
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
        Schema::dropIfExists('libros');
    }
}
