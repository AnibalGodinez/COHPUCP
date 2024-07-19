<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionesTable extends Migration
{

    public function up()
    {
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('user_id'); // Agrega el campo user_id
            $table->timestamps();

            // Define la restricción de clave externa
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade') // Elimina capacitaciones si se elimina el usuario
            ->onUpdate('cascade'); // Actualiza user_id en capacitaciones si se actualiza el id del usuario
        });
    }

    public function down()
    {
         // Elimina la restricción de clave foránea antes de eliminar la tabla
         Schema::table('capacitaciones', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        
        Schema::dropIfExists('capacitaciones');
    }
}
