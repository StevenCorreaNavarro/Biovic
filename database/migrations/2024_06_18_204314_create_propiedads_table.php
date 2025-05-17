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
        Schema::create('propiedads', function (Blueprint $table) {
            $table->id();
//  $table->string('foto')->nullable();
            $table -> string('nombreempresa')->nullable(); 
            $table -> string('nitempresa')->nullable(); 
            $table -> string('direccionempre')->nullable(); 
            $table -> string('telefonoempre')->nullable(); 
            $table -> string('ciudadempre')->nullable(); 
            $table -> string('sedeempresa')->nullable(); 
            $table -> string('emailWebempre')->nullable(); 
            $table -> string('representanteempresa')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedads');
    }
};
