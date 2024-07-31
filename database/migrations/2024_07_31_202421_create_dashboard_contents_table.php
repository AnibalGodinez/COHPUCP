<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardContentsTable extends Migration
{
    public function up()
    {
        Schema::create('dashboard_contents', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('layout')->nullable(); // Layout del dashboard
            $table->string('title')->nullable(); // Título principal
            $table->string('subtitle')->nullable(); // Subtítulo
            $table->text('description')->nullable(); // Descripción del contenido

            // Gráficos e Indicadores
            $table->json('bar_charts')->nullable(); // Gráficos de barras
            $table->json('pie_charts')->nullable(); // Gráficos de pastel

            // Tablas y Listas
            $table->json('data_tables')->nullable(); // Tablas de datos
            $table->json('task_lists')->nullable(); // Listas de tareas

            // Archivos
            $table->json('pdf_files')->nullable(); // Archivos PDF
            $table->json('documents')->nullable(); // Documentos

            // Enlaces
            $table->json('internal_links')->nullable(); // Enlaces internos
            $table->json('external_links')->nullable(); // Enlaces externos

            // Medios
            $table->json('images')->nullable(); // Imágenes
            $table->json('videos')->nullable(); // Videos

            // Widgets y Componentes Interactivos
            $table->json('calendars')->nullable(); // Calendarios
            $table->json('maps')->nullable(); // Mapas

            // Links de Redes Sociales
            $table->string('facebook_link')->nullable(); // Enlace de Facebook
            $table->string('twitter_link')->nullable(); // Enlace de Twitter
            $table->string('youtube_link')->nullable(); // Enlace de YouTube
            $table->string('whatsapp_link')->nullable(); // Enlace de WhatsApp
            $table->string('instagram_link')->nullable(); // Enlace de Instagram

            // Relación con usuarios
            $table->unsignedBigInteger('user_id')->nullable(); // ID del usuario
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade') // Eliminar en cascada
                  ->onUpdate('cascade'); // Actualizar en cascada

            $table->timestamps(); // Timestamps de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('dashboard_contents');
    }
}
