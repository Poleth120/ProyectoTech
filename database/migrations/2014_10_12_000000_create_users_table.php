<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // ID para la tabla de la BDD
            $table->id();

            // columnas para la tabla BDD
            $table->string('first_name', 50);
            $table->string('last_name', 50);
//            $table->string('username', 50);
            $table->string('personal_phone', 10)->unique();
            $table->string('password');
            $table->boolean('tipo_usuario')->default(0); // 0 = personal && 1 = administrador
            $table->boolean('state')->default(false);

            // columnas que seran unicas para la tabla de la BDD
            $table->string('email')->unique();

            // columnas que seran podran aceptar regitros null para la tabla de la BDD
            $table->timestamp('email_verified_at')->nullable();

            // columnas especiales para la tabla de la BDD
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};