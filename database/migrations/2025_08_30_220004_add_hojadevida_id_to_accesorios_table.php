<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.   perame un momentico ensayo un scrip breve
     */
   public function up(): void
{
    Schema::table('accesorios', function (Blueprint $table) {
        $table->unsignedBigInteger('hojadevida_id')->nullable()->after('id');

        $table->foreign('hojadevida_id')
              ->references('id')
              ->on('hojadevidas')
              ->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('accesorios', function (Blueprint $table) {
        $table->dropForeign(['hojadevida_id']);
        $table->dropColumn('hojadevida_id');
    });
}

};
