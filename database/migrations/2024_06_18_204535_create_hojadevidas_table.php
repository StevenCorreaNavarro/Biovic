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
        Schema::create('hojadevidas', function (Blueprint $table) {
            $table->id();

            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');
            $table->string('perioCali');// si, solicita fecha
            $table->date('fechaCali')->nullable();
            $table->string('actFijo');
            $table->string('regInvima');
            $table->string('Estado');
            $table->string('foto');

            $table->date('fechaAdquisicion');
            $table->date('fechaInstalacion');
            $table->date('garantia');
            $table->date('vidaUtil');
            $table->integer('costo');
            $table->string('factura');

            // $table->integer('fuenteAlimentacion')->nullable();
            $table->integer('volMax');
            $table->integer('volMin');
            $table->integer('presion');
            $table->integer('peso');
            $table->integer('frecuencia');
            $table->integer('corrienteMax');
            $table->integer('corrienteMin');
            $table->integer('potencia');
            $table->integer('dimLargo');
            $table->integer('dimAncho');
            $table->integer('dimAlto');
            $table->integer('capacidad');
            $table->integer('temperatura');
            $table->integer('velocidad');
            $table->integer('humedad');
            $table->text('recomendaciones');

            $table->unsignedBigInteger('servicio_id')->nullable();	 
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
            $table->unsignedBigInteger('nombre_equipo_id')->nullable();
            $table->foreign('nombre_equipo_id')->references('id')->on('nombre_equipos')->onDelete('cascade');
            $table->unsignedBigInteger('tec_predo_id')->nullable();	 
            $table->foreign('tec_predo_id')->references('id')->on('tec_predos')->onDelete('cascade');
            $table->unsignedBigInteger('cod_ecri_id')->nullable();	 
            $table->foreign('cod_ecri_id')->references('id')->on('cod_ecris')->onDelete('cascade');
            $table->unsignedBigInteger('ubi_fisica_id')->nullable();	 
            $table->foreign('ubi_fisica_id')->references('id')->on('ubi_fisicas')->onDelete('cascade');
            $table->unsignedBigInteger('cla_riesgo_id')->nullable();	 
            $table->foreign('cla_riesgo_id')->references('id')->on('cla_riesgos')->onDelete('cascade');
            $table->unsignedBigInteger('cla_biome_id')->nullable();	 
            $table->foreign('cla_biome_id')->references('id')->on('cla_biomes')->onDelete('cascade');
            $table->unsignedBigInteger('cla_uso_id')->nullable();	 
            $table->foreign('cla_uso_id')->references('id')->on('cla_usos')->onDelete('cascade');

            $table->unsignedBigInteger('forma_adqui_id')->nullable();	 
            $table->foreign('forma_adqui_id')->references('id')->on('forma_adquis')->onDelete('cascade');
            $table->unsignedBigInteger('propiedad_id')->nullable();	 
            $table->foreign('propiedad_id')->references('id')->on('propiedads')->onDelete('cascade'); 


            $table->unsignedBigInteger('mag_fuen_alimen_id')->nullable();	
            $table->foreign('mag_fuen_alimen_id')->references('id')->on('mag_fuen_alimens')->onDelete('cascade');
            $table->unsignedBigInteger('mag_vol_id')->nullable();	 
            $table->foreign('mag_vol_id')->references('id')->on('mag_vols')->onDelete('cascade');
            $table->unsignedBigInteger('mag_pre_id')->nullable();	 
            $table->foreign('mag_pre_id')->references('id')->on('mag_pres')->onDelete('cascade');
            $table->unsignedBigInteger('mag_peso_id')->nullable();	 
            $table->foreign('mag_peso_id')->references('id')->on('mag_pesos')->onDelete('cascade');
            $table->unsignedBigInteger('mag_fre_id')->nullable();	
            $table->foreign('mag_fre_id')->references('id')->on('mag_fres')->onDelete('cascade');
            $table->unsignedBigInteger('mag_corriente_id')->nullable();	 
            $table->foreign('mag_corriente_id')->references('id')->on('mag_corrientes')->onDelete('cascade');
            $table->unsignedBigInteger('mag_pot_id')->nullable();	 
            $table->foreign('mag_pot_id')->references('id')->on('mag_pots')->onDelete('cascade');
            $table->unsignedBigInteger('mag_dimension_id')->nullable();	 
            $table->foreign('mag_dimension_id')->references('id')->on('mag_dimensions')->onDelete('cascade');
            $table->unsignedBigInteger('mag_capa_id')->nullable();	 
            $table->foreign('mag_capa_id')->references('id')->on('mag_capas')->onDelete('cascade');
            $table->unsignedBigInteger('mag_temp_id')->nullable();	 
            $table->foreign('mag_temp_id')->references('id')->on('mag_temps')->onDelete('cascade');
            $table->unsignedBigInteger('mag_vel_id')->nullable();	 
            $table->foreign('mag_vel_id')->references('id')->on('mag_vels')->onDelete('cascade');
            $table->unsignedBigInteger('accesorio_id')->nullable();	 
            $table->foreign('accesorio_id')->references('id')->on('accesorios')->onDelete('cascade');
            $table->unsignedBigInteger('proveedor_id')->nullable();	 
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete('cascade');
            $table->unsignedBigInteger('fabricante_id')->nullable();	 
            $table->foreign('fabricante_id')->references('id')->on('fabricantes')->onDelete('cascade');


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hojadevidas');
    }
};
