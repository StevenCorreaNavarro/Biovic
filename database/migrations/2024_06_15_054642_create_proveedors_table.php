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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table -> string('nombreProveedor')->nullable();
            $table -> string('direccionProvee')->nullable();
            $table -> string('telefonoProvee')->nullable();
            $table -> string('ciudadProvee')->nullable();
            $table -> string('emailWebProve')->nullable();         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
