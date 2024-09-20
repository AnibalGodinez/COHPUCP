<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesVacantesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes_vacantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con la tabla users
            $table->string('nombre_empresa');
            $table->string('nombre_vacante');
            $table->text('descripcion');
            $table->text('responsabilidades');
            $table->text('requisitos');
            $table->string('experiencia');
            $table->string('tiempo'); // Ejemplo: Tiempo completo, Medio tiempo
            $table->text('ubicacion');
            $table->string('correo');
            $table->string('telefono');
            $table->string('celular');
            $table->string('enlace')->nullable(); // Enlace a sitio externo si es necesario
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->timestamps();

            // Relación con la tabla users
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes_vacantes');
    }
}
