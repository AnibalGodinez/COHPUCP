<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterContentsTable extends Migration
{

    public function up()
    {
        Schema::create('footer_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Títulos
            $table->text('description')->nullable(); // Descripción del contenido
            

            $table->string('links')->nullable(); // Enlaces
            $table->string('facebook_link')->nullable(); // Enlace de Facebook
            $table->string('twitter_link')->nullable(); // Enlace de Twitter
            $table->string('youtube_link')->nullable(); // Enlace de YouTube
            $table->string('whatsapp_link')->nullable(); // Enlace de WhatsApp
            $table->string('instagram_link')->nullable(); // Enlace de Instagram
            $table->string('telegram_link')->nullable(); // Enlace de Telegram
            $table->string('linkendin_link')->nullable(); // Enlace de Linkendln

            $table->string('boton')->nullable(); // Campo llamado boton

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
        Schema::dropIfExists('footer_contents');
    }
}
