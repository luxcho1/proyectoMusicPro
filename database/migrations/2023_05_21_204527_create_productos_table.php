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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('Nombre');
            $table->string('Codigo');
            $table->string('Descripcion');
            $table->double('Precio');
            $table->double('Stock');
            $table->string('Foto');

            $table->timestamps();
        });
    }
    //$table->double('precio')->nullable();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
