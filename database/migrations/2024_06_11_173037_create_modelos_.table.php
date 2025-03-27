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
        Schema::create('modelos', function (Blueprint $table) {
            $table->id(); // entero grande sin signo 
            $table->string('nombre_modelo');
            // $table->foreignId('equipo_id')->constrained()->onDelete('cascade'); // Asegurar que la columna sea 'equipo_id'

            $table->unsignedBigInteger('marca_id')->nullable();;
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas')
                ->onDelete('cascade')
                ->unUpdate('cascade');

            // $table->unsignedBigInteger('modeloequipos_id')->nullable();;
            // $table->foreign('modeloEquipos_id')
            //     ->references('id')
            //     ->on('modeloequipos')
            //     ->onDelete('cascade')
            //     ->unUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelos');
    }
};
