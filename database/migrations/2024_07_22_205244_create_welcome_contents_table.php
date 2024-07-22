<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWelcomeContentsTable extends Migration
{

    public function up()
    {
        Schema::create('welcome_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Asegúrate de que sea nullable si no siempre se asigna
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')   // Configurar eliminación en cascada
                  ->onUpdate('cascade');  // Configurar actualización en cascada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('welcome_contents');
    }
}
