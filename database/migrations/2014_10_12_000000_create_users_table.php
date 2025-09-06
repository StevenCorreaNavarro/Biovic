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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('user')->nullable(); // Puede ser 'admin' o 'user'
            $table->string('name') ->unique();   
            $table->string('codigo') ->unique()->nullable(); 

            $table->string('identity')->nullable();
            $table->string('foto')->nullable();
            $table->string('contact')->nullable();
            $table->string('adress')->nullable();
            $table->string('profession')->nullable();
            $table->string('post')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
