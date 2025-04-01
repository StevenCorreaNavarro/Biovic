<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('equipo_marcas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id')->nullable();
            $table->unsignedBigInteger('marca_id')->nullable();

            //referenciando la tabla users
            $table->foreign('equipo_id')
                ->references('id')
                ->on('equipos')->onDelete('set null');

            //referenciando la tabla categorias    
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipo_marcas');
    }
};
