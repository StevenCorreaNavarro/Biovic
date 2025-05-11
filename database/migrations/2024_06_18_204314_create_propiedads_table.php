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
            $table -> string('nombreempresa');
            $table -> string('nitempresa');
            $table -> string('direccionempre');
            $table -> string('telefonoempre');
            $table -> string('ciudadempre');
            $table -> string('sedeempresa');
            $table -> string('emailWebempre');
            $table -> string('representanteempresa');

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
