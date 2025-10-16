<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {Schema::create('akun', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kampus');
        $table->text('alamat');
        $table->string('provinsi');
        $table->string('email_kampus')->unique();
        $table->string('nomor_telepon');
        $table->string('website_kampus')->nullable();
        $table->string('koordinator_program');
        $table->string('email_koordinator');
        $table->enum('role',['admin','reviewer','kampus'])->default('kampus');
        $table->string('logo_kampus')->nullable();
        $table->string('password');
        $table->rememberToken(); // untuk login
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
