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
            $table->string('num_colegiacion')->nullable();
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

            // II. Datos Personales
            $table->date('fecha_graduacion');
            $table->string('universidad');
            $table->string('nombre_empresa_trabajo_actual')->nullable();

            // III. Documentos
            $table->json('imagen_titulo');           

            // IX. Estado de la inscripción
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->text('descripcion_estado_solicitud')->nullable();
            $table->timestamps();

            // Relación con la tabla `users`
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
