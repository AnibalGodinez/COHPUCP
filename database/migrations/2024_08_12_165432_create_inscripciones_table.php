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
            $table->string('municipio_realiza_solicitud')->nullable();

            // II. Datos Personales
            $table->date('fecha_graduacion');
            $table->string('universidad');
            $table->string('nombre_empresa_trabajo_actual')->nullable();
            $table->string('cargo')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('correo_empresa')->nullable()->unique();
            $table->string('telefono_empresa')->nullable();
            $table->string('extension_telefono_empresa')->nullable();

            // III. Información Adicional
            $table->string('especialidad_1')->nullable();
            $table->string('lugar_especialidad_1')->nullable();
            $table->date('fecha_especialidad_1')->nullable();

            $table->string('especialidad_2')->nullable();
            $table->string('lugar_especialidad_2')->nullable();
            $table->date('fecha_especialidad_2')->nullable();

            // IV. Cursos de especialización
            $table->string('nombre_curso_especializacion')->nullable();
            $table->string('lugar_curso')->nullable();
            $table->date('fecha_curso')->nullable();

            // V. Experiencia Profesional
            $table->text('nombre_empresa1')->nullable();
            $table->text('cargo_empresa1')->nullable();
            $table->text('duración_empresa1')->nullable();

            $table->text('nombre_empresa2')->nullable();
            $table->text('cargo_empresa2')->nullable();
            $table->text('duración_empresa2')->nullable();

            // VI. Misiones Desempeñadas
            $table->text('comisiones')->nullable();
            $table->text('representaciones')->nullable();
            $table->text('delegaciones')->nullable();

            // VII. Otros
            $table->text('publicacion_documentos')->nullable();
            $table->text('publicaciones')->nullable();
            $table->text('publicacion_libro')->nullable();

            // VIII. Documentos
            $table->json('imagen_titulo');           
            $table->json('imagen_dni');
            $table->json('imagen_tamano_carnet');
            $table->string('cv');
            $table->json('imagen_dni_beneficiario1');
            $table->json('imagen_dni_beneficiario2')->nullable();
            $table->json('imagen_dni_beneficiario3')->nullable();
            $table->json('imagen_rtn')->nullable();
            $table->json('imagen_firma_solicitante')->nullable();

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
