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
        Schema::create('empleips', function (Blueprint $table) {
            $table->id();
            $table->string('nombreempleips');
            $table->string('apellioempleips');
            $table->string('fotoempleips');            
            $table->bigInteger('identificacionempleips');
            $table->bigInteger('numerocelempleips');
            $table->string('emailempleips');
            $table->string('direccionempleips');
            $table->string('profesionempleips');
            $table->string('cargoempleips');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleips');
    }
};
