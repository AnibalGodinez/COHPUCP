<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name2')->nullable();
            $table->string('apellido');
            $table->string('apellido2')->nullable();
            $table->string('numero_identidad')->unique();
            $table->string('numero_colegiacion')->nullable()->unique();
            $table->string('rtn')->nullable()->unique();
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->date('fecha_nacimiento');
            $table->string('telefono')->nullable();
            $table->string('telefono_celular');
            $table->string('email')->unique();
            $table->enum('estado',['activo', 'inactivo'])->default('activo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('pais_id')->nullable(); 
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade')->onUpdate('cascade'); // Agregar la relación
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
