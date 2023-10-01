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
            $table->string('slug')->unique();
            $table->unsignedBigInteger('kegiatan_id');
            $table->string('kode_rek_dalam_daerah');
            $table->string('kode_rek_luar_daerah');
            $table->unsignedBigInteger('pptk_id');
            $table->unsignedBigInteger('bendahara_id');
            $table->unsignedBigInteger('pelaksana_administrasi_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketentuans', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
