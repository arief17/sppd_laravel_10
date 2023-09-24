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
        Schema::create('ketentuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kegiatan');
            $table->string('kode_rek_dalam_daerah');
            $table->string('kode_rek_luar_daerah');
            $table->unsignedBigInteger('pptk');
            $table->unsignedBigInteger('bendahara');
            $table->unsignedBigInteger('pelaksana_administrasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketentuans');
    }
};
