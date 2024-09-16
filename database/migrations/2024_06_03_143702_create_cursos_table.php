<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('layout')->nullable();
            $table->string('titulo')->nullable();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('precio')->nullable();
            $table->text('enlace')->nullable();
            $table->text('icono')->nullable(); 
            $table->decimal('calificacion', 3, 1)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('idioma_id')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable(); 
            $table->string('imagen')->nullable();
            $table->timestamps();

            // Define la restricción de clave externa con acciones en cascada
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('idioma_id')
                  ->references('id')
                  ->on('idiomas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
