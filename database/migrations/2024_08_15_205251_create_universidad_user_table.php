<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversidadUserTable extends Migration
{

    public function up()
    {
        Schema::create('universidad_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('universidad_id')->constrained('universidades')
            ->onDelete('cascade') // Eliminar en cascada
            ->onUpdate('cascade'); // Actualizar en cascada
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('universidad_user');
    }
}
