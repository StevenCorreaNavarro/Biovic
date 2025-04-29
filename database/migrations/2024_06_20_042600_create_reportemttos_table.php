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

            $table->unsignedBigInteger('hojadevida_id')->nullable();
            $table->foreign('hojadevida_id')->references('id')->on('hojadevidas')->onDelete('cascade');

            $table->unsignedBigInteger('ubifisica_id')->nullable();
            $table->foreign('ubifisica_id')->references('id')->on('ubifisicas')->onDelete('cascade');

            $table -> text('descripcionEquipo');

            $table->unsignedBigInteger('estadoequipo_id')->nullable();
            $table->foreign('estadoequipo_id')->references('id')->on('estadoequipos')->onDelete('cascade');

            $table -> string('contraro');

            $table -> date('fechaatencion');
            $table -> time('horainicial');
            $table -> time('horafinal');
            $table->time('duracion');
            $table -> text('actividad');

            $table->unsignedBigInteger('empleadomtto_id')->nullable();
            $table->foreign('empleadomtto_id')->references('id')->on('empleadomttos')->onDelete('cascade');

            $table->longText('precaucionesUso');

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
