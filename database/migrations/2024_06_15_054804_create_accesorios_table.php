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
        Schema::create('accesorios', function (Blueprint $table) {
            $table->id();
            $table -> string('nombreAccesorio')->nullable();   
            $table -> string('marcaAccesorio')->nullable();   
            $table -> string('modeloAccesorio')->nullable();   
            $table -> string('serieAccesorio')->nullable();   
            $table -> integer('costoAccesorio')->nullable();
               
            
            // Relación con la tabla equipos
            // $table->unsignedBigInteger('equipo_id');
            // $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            
                                   
            $table->timestamps();

 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesorios');
    }
};
