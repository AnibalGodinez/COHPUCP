<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionFirmasTable extends Migration
{
    public function up()
    {
        Schema::create('inscripcion_firmas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_sociedad');
            $table->string('num_inscripcion_registro_publico_comercio')->nullable();
            $table->date('fecha_constitucion');
            $table->string('registro_tributario_nacional')->nullable();
            $table->string('num_inscripcion_camara_comercio')->nullable();
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('celular');
            $table->string('email')->unique();

            $table->string('primer_nombre_socio1');
            $table->string('segundo_nombre_socio1')->nullable();
            $table->string('primer_apellido_socio1');
            $table->string('segundo_apellido_socio1')->nullable();
            $table->string('num_colegiacion_socio1')->nullable();
            $table->string('imagen_firma_socio1')->nullable();

            $table->string('primer_nombre_socio2');
            $table->string('segundo_nombre_socio2')->nullable();
            $table->string('primer_apellido_socio2');
            $table->string('segundo_apellido_socio2')->nullable();
            $table->string('num_colegiacion_socio2')->nullable();
            $table->string('imagen_firma_socio2')->nullable();

            $table->string('primer_nombre_socio3');
            $table->string('segundo_nombre_socio3')->nullable();
            $table->string('primer_apellido_socio3');
            $table->string('segundo_apellido_socio3')->nullable();
            $table->string('num_colegiacion_socio3')->nullable();
            $table->string('imagen_firma_socio3')->nullable();

            $table->string('imagen_firma_social')->nullable();
            $table->string('imagen_firma_representante_legal')->nullable();

            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->text('descripcion_estado_solicitud')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripcion_firmas');
    }
}
