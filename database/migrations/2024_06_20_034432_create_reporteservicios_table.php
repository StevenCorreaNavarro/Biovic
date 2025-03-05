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
        Schema::create('reporteservicios', function (Blueprint $table) {
            $table->id();

            $table -> string('consereporteser');
            $table -> date('fechareporte');
            $table -> string('dirigido');
            $table -> date('fechadaño');
            $table -> text('descripcion');
            $table -> string('fotoequipodañado');
            $table -> string('fotofirmareporta');
            $table -> string('fotofirmarecibe');

            $table->unsignedBigInteger('tipomtto_id')->nullable();
            $table->foreign('tipomtto_id')->references('id')->on('tipomttos')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('empleadomtto_id')->nullable();
            $table->foreign('empleadomtto_id')->references('id')->on('empleadomttos')->onDelete('cascade');
            $table->unsignedBigInteger('propiedad_id')->nullable();
            $table->foreign('propiedad_id')->references('id')->on('propiedads')->onDelete('cascade');
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->unsignedBigInteger('ubi_fisica_id')->nullable();
            $table->foreign('ubi_fisica_id')->references('id')->on('ubi_fisicas')->onDelete('cascade');
            $table->unsignedBigInteger('hojadevida_id')->nullable();
            $table->foreign('hojadevida_id')->references('id')->on('hojadevidas')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporteservicios');
    }
};
