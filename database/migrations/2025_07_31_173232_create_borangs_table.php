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
    public function up()
    {
        Schema::create('borangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('akun_id'); // relasi ke tabel akun
            $table->string('nama_kampus');
            $table->string('nama_pengisi');
            $table->string('pilar');
            $table->string('kriteria');
            $table->string('sub_kriteria');
            $table->string('indikator_penilaian');
            $table->string('link_evidence');
            $table->text('catatan_tambahan');
            $table->timestamps();

            $table->foreign('akun_id')->references('id')->on('akun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borangs');
    }
};
