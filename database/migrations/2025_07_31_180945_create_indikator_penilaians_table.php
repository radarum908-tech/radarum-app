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
        Schema::create('indikator_penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_kriteria_id');
            $table->foreign('sub_kriteria_id')
                  ->references('id')->on('sub_kriterias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('indikator_penilaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indikator_penilaians');
    }
};
