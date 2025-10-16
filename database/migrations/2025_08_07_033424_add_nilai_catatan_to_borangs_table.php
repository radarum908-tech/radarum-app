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
        Schema::table('borangs', function (Blueprint $table) {
            $table->integer('nilai')->nullable();
            $table->text('catatan_penilai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borangs', function (Blueprint $table) {
            $table->dropColumn(['nilai', 'catatan_penilai']);
        });
    }
};
