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
            $table->date('fecha_inscripcion');

            $table->unsignedBigInteger('user_id'); // Relación con la tabla de usuarios

            // I. Datos de la sociedad
            $table->string('nombre_sociedad');
            $table->string('num_inscripcion_registro_publico_comercio')->nullable();
            $table->date('fecha_constitucion');
            $table->string('registro_tributario_nacional')->nullable();
            $table->string('num_inscripcion_camara_comercio')->nullable();
            $table->string('municipio_realiza_solicitud')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular');
            $table->string('email')->unique();

            // II. Datos de los socios

            // socio 1
            $table->string('primer_nombre_socio1');
            $table->string('segundo_nombre_socio1')->nullable();
            $table->string('primer_apellido_socio1');
            $table->string('segundo_apellido_socio1')->nullable();
            $table->string('num_colegiacion_socio1')->nullable();
            $table->string('cv_socio1')->nullable();
            $table->string('imagen_firma_socio1')->nullable();
            $table->string('constancia_solvencia_socio1')->nullable();
            $table->json('imagen_titulo_socio1')->nullable();

            // socio 2
            $table->string('primer_nombre_socio2');
            $table->string('segundo_nombre_socio2')->nullable();
            $table->string('primer_apellido_socio2');
            $table->string('segundo_apellido_socio2')->nullable();
            $table->string('num_colegiacion_socio2')->nullable();
            $table->string('cv_socio2')->nullable();
            $table->string('imagen_firma_socio2')->nullable();
            $table->string('constancia_solvencia_socio2')->nullable();
            $table->json('imagen_titulo_socio2')->nullable();
            
            // socio 3
            $table->string('primer_nombre_socio3');
            $table->string('segundo_nombre_socio3')->nullable();
            $table->string('primer_apellido_socio3');
            $table->string('segundo_apellido_socio3')->nullable();
            $table->string('num_colegiacion_socio3')->nullable();
            $table->string('cv_socio3')->nullable();
            $table->string('imagen_firma_socio3')->nullable();
            $table->string('constancia_solvencia_socio3')->nullable();
            $table->json('imagen_titulo_socio3')->nullable();
            
            // socio 4
            $table->string('primer_nombre_socio4');
            $table->string('segundo_nombre_socio4')->nullable();
            $table->string('primer_apellido_socio4');
            $table->string('segundo_apellido_socio4')->nullable();
            $table->string('num_colegiacion_socio4')->nullable();
            $table->string('cv_socio4')->nullable();
            $table->string('imagen_firma_socio4')->nullable();
            $table->string('constancia_solvencia_socio4')->nullable();
            $table->json('imagen_titulo_socio4')->nullable();
            
            // III. Documentos
            $table->string('imagen_escritura_constitucion')->nullable();
            $table->string('imagen_registro_mercantil')->nullable();
            $table->string('imagen_rtn_firma_auditora')->nullable();
            $table->string('nomina_pago_firma')->nullable();

            // IV. Firmas digitales
            $table->string('imagen_firma_social')->nullable();
            $table->string('imagen_firma_representante_legal')->nullable();

            // V. Estado de la inscripción de la firma
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
        Schema::dropIfExists('inscripcion_firmas');
    }
}
