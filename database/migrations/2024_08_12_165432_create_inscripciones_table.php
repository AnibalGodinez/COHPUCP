<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{

    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con la tabla de usuarios
            $table->string('nombre');
            $table->string('dni')->unique();
            $table->string('correo')->unique();
            $table->string('universidad');
            $table->date('fecha_inscripcion');
            $table->string('imagen_titulo')->nullable();    
            $table->string('cv'); // Campo para almacenar el currículum vitae (archivo PDF)
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
