<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id(); // entero grande sin signo 
            $table->string('nombre_equipo');

            $table->unsignedBigInteger('marcaequipos_id')->nullable();;
            $table->foreign('marcaequipos_id')
                ->references('id')
                ->on('marcaequipos')
                ->onDelete('cascade')
                ->unUpdate('cascade');

            $table->unsignedBigInteger('modeloequipos_id')->nullable();;
            $table->foreign('modeloEquipos_id')
                ->references('id')
                ->on('modeloequipos')
                ->onDelete('cascade')
                ->unUpdate('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
