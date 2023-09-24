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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('level_admin')->references('id')->on('level_admins');
            $table->foreign('seksi')->references('id')->on('seksis');
            $table->foreign('bidang')->references('id')->on('bidangs');
        });

        Schema::table('seksis', function (Blueprint $table) {
            $table->foreign('bidang')->references('id')->on('bidangs');
        });

        Schema::table('tanda_tangans', function (Blueprint $table) {
            $table->foreign('pegawai')->references('id')->on('pegawais');
            $table->foreign('jabatan')->references('id')->on('jabatans');
        });

        Schema::table('ketentuans', function (Blueprint $table) {
            $table->foreign('kegiatan')->references('id')->on('kegiatans');
            $table->foreign('pptk')->references('id')->on('pegawais');
            $table->foreign('bendahara')->references('id')->on('pegawais');
            $table->foreign('pelaksana_administrasi')->references('id')->on('pegawais');
        });

        Schema::table('pegawais', function (Blueprint $table) {
            $table->foreign('jabatan')->references('id')->on('jabatans');
        });

        Schema::table('biaya_perdins', function (Blueprint $table) {
            $table->foreign('area')->references('id')->on('jenis_perdins');
            $table->foreign('dari')->references('id')->on('kota_kabupatens');
            $table->foreign('ke')->references('id')->on('kota_kabupatens');
            $table->foreign('transport')->references('id')->on('uang_transports');
            $table->foreign('harian')->references('id')->on('uang_harians');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('seksis');
        Schema::dropIfExists('tanda_tangans');
        Schema::dropIfExists('ketentuans');
        Schema::dropIfExists('pegawais');
    }
};
