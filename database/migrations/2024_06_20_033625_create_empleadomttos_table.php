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
        Schema::create('empleadomttos', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombremtto');
            $table->bigInteger('identificacionmtto');
            $table->bigInteger('numerocelmtto');
            $table->string('emailmtto');
            $table->string('direccionmtto');
            $table->string('profesionmtto');
            $table->string('cargomtto');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleadomttos');
    }
};
