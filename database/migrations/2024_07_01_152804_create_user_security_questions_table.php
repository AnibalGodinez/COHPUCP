<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSecurityQuestionsTable extends Migration
{

    public function up()
    {
        Schema::create('user_security_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
            ->onDelete('cascade') // Eliminar en cascada
            ->onUpdate('cascade'); // Actualizar en cascada

            $table->foreignId('security_question_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('answer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_security_questions');
    }
}
