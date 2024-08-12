<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{

    public function up()
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            // I. Datos Personales
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('dni');
            $table->string('lugar_nacimiento');
            $table->date('fecha_nacimiento');
            $table->string('direccion_residencia');
            $table->string('telefono_fijo');
            $table->string('correo_electronico');
            $table->string('celular');

            // II. Datos Profesionales
            $table->date('fecha_graduacion');
            $table->string('universidad');
            $table->string('nombre_empresa_trabajo_actual');
            $table->string('cargo');
            $table->string('direccion_empresa');
            $table->string('correo_empresa');
            $table->string('telefono_empresa');
            $table->string('extension_telefono_empresa');

            // III. Información Adicional
            $table->string('especialidad_1')->nullable();
            $table->string('lugar_especialidad_1')->nullable();
            $table->date('fecha_especialidad_1')->nullable();

            $table->string('especialidad_2')->nullable();
            $table->string('lugar_especialidad_2')->nullable();
            $table->date('fecha_especialidad_2')->nullable();

            // Cursos de especialización
            $table->string('nombre_curso_especializacion')->nullable();
            $table->string('lugar_curso')->nullable();
            $table->date('fecha_curso')->nullable();

            // IV. Experiencia Profesional
            $table->text('nombre_empresa1')->nullable();
            $table->text('cargo_empresa1')->nullable();
            $table->text('duración_empresa1')->nullable();

            $table->text('nombre_empresa2')->nullable();
            $table->text('cargo_empresa2')->nullable();
            $table->text('duración_empresa2')->nullable();

            // V. Misiones Desempeñadas
            $table->text('comisiones')->nullable();
            $table->text('representaciones')->nullable();
            $table->text('delegaciones')->nullable();

            // Extras
            $table->text('publicacion_documentos')->nullable();
            $table->text('publicaciones')->nullable();
            $table->text('publicacion_libro')->nullable();
            $table->text('otros')->nullable();

            // VI. Archivos y documentos
            $table->string('imagen_titulo_original')->nullable();
            $table->string('imagen_dni')->nullable();
            $table->string('imagen_tamano_carnet')->nullable();
            $table->string('pdf_curriculum_vitae')->nullable();
            $table->string('imagen_dni_beneficiario1')->nullable();
            $table->string('imagen_dni_beneficiario2')->nullable();
            $table->string('imagen_rtn')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
