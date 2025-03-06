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
        Schema::create('reportemttos', function (Blueprint $table) {
            $table->id();

            $table -> string('consereportemtto');
            $table -> date('fechaatencion');
            $table -> text('actividad');
            $table -> integer('cantidad');
            $table -> string('material');
            $table -> integer('valoruni');
            $table -> integer('valortotal');
            $table -> text('observaciones');
            $table -> string('fotofirmaentrega');
            $table -> string('fotofirmarecibe');
            
            $table->unsignedBigInteger('reporteservicio_id')->nullable();
            $table->foreign('reporteservicio_id')->references('id')->on('reporteservicios')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('empleadomtto_id')->nullable();
            $table->foreign('empleadomtto_id')->references('id')->on('empleadomttos')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportemttos');
    }
};
