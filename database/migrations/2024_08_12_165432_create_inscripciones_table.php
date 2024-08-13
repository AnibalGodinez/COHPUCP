<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id(); // clave primaria

            // I. Datos Personales
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('dni');
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento')->nullable();
            $table->string('direccion_residencia')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('correo_electronico');
            $table->string('celular');

            // II. Datos Profesionales
            $table->date('fecha_graduacion');
            $table->string('universidad');
            $table->string('nombre_empresa_trabajo_actual')->nullable();
            $table->string('cargo')->nullable();
            $table->string('direccion_empresa')->nullable();
            $table->string('correo_empresa')->nullable();
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
            $table->text('otros')->nullable();

            // VIII. Documentos
            $table->string('imagen_titulo_original');
            $table->string('imagen_dni');
            $table->string('imagen_tamano_carnet');
            $table->string('pdf_curriculum_vitae');
            $table->string('imagen_dni_beneficiario1');
            $table->string('imagen_dni_beneficiario2');
            $table->string('imagen_dni_beneficiario3');
            $table->string('imagen_rtn');

            // IX. Estado de la inscripción
            $table->enum('estado', ['enviado', 'en proceso', 'aceptado', 'rechazado'])->default('enviado');

            // Relación con la tabla `users`
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
