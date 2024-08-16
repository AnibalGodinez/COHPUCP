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
            $table->date('fecha_inscripcion');

            $table->unsignedBigInteger('user_id'); // Relación con la tabla de usuarios
            
            // I. Datos Personales
            $table->string('name');
            $table->string('name2')->nullable();
            $table->string('apellido');
            $table->string('apellido2')->nullable();
            $table->string('numero_identidad')->unique();
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento')->nullable();
            $table->string('direccion_residencia')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_celular');
            $table->string('email')->unique();


            
            $table->string('universidad');
            $table->json('imagen_titulo')->nullable();    
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
