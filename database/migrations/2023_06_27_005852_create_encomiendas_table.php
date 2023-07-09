<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encomiendas', function (Blueprint $table) {
            $table->id();

            $table->string('num_boleta');
            $table->string('nombre_origen');
            $table->string('direccion_origen');
            $table->string('nombre_destino');
            $table->string('direccion_destino');
            $table->string('comentario');
            $table->string('info')->nullable();
            $table->string('codigo_seguimiento')->nullable();
            $table->string('estado_seguimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encomiendas');
    }
};



// Schema::create('encomiendas', function (Blueprint $table) {
//     $table->id();

//     $table->string('nombre_origen');
//     $table->string('direccion_origen');
//     $table->string('nombre_destino');
//     $table->string('direccion_destino');
//     $table->string('comentario');
//     $table->json('info')->nullable();
//     $table->string('codigo_seguimiento')->nullable();
//     $table->integer('id_boleta');
//     $table->timestamps();
// });
