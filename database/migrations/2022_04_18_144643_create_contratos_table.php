<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            // ID para la tabla de la BDD
            $table->id();
            // columnas para la tabla BDD
            $table->boolean('state')->default(true);
            $table->integer('año');
            $table->string('cód', 20)->unique();
            $table->string('tít_contrato', 1000);
            $table->string('tipo',100);
            $table->boolean('cpc')->nullable();
            $table->string('clte',100);
            $table->string('tipo_clte', 30);
            $table->date('inicio');
            $table->date('termino')->nullable();
            $table->double('monto_sin_iva');
            $table->string('estado', 20)->nullable();
            $table->double('p_anticipo',4,2)->nullable();
            $table->double('val_anticipo_sin_iva')->nullable();
            $table->double('val_cobrar_sin_iva')->nullable();
            //$table->tinyInteger('IVA');
            $table->double('IVA',4,2);
            $table->double('monto_final_con_iva')->nullable();

            // Un usuario puede realizar muchos reportes y un reporte le pertenece a un usuario          
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            // columnas especiales para la tabla de la BDD

            $table->timestamps();    
        });
    }

    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};