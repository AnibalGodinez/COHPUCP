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
            $table->string('layout');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('categoria');
            $table->string('precio'); // Campo para el precio del curso, es string porque puede agregar 'Gratis'
            $table->text('enlace')->nullable(); // Campo opcional para un enlace relacionado con el curso
            $table->decimal('calificacion', 3, 1)->nullable(); // Campo opcional para la calificación del curso (1 decimal)
            $table->string('idioma')->nullable(); // Campo opcional para el idioma del curso
            $table->string('imagen')->nullable(); // Campo opcional para la imagen del curso
            $table->unsignedBigInteger('user_id'); // Campo para relacionar con la tabla de usuarios
            $table->unsignedBigInteger('idioma_id')->nullable(); // Nuevo campo para relacionar con la tabla de idiomas
            $table->unsignedBigInteger('categoria_id')->nullable(); // Nuevo campo para relacionar con la tabla de categorías
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
