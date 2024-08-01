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
            $table->string('layout')->nullable(); // estilos de contenidos que se agregarán en el dashboard
            $table->string('title')->nullable(); // Título principal
            $table->string('subtitle')->nullable(); // Subtítulo
            $table->text('description')->nullable(); // Descripción del contenido

            // Archivos
            $table->string('pdf')->nullable(); // Archivos PDF
            $table->string('images')->nullable(); // Imágenes
            $table->string('videos')->nullable(); // Videos

            // Links de Redes Sociales
            $table->string('links')->nullable(); // Enlaces
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
