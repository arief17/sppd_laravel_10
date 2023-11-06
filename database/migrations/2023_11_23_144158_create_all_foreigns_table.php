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
            $table->foreign('level_admin_id')->references('id')->on('level_admins');
            $table->foreign('seksi_id')->references('id')->on('seksis');
        });

        Schema::table('bidangs', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });
        
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('pegawais', function (Blueprint $table) {
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->foreign('golongan_id')->references('id')->on('golongans');
            $table->foreign('ruang_id')->references('id')->on('ruangs');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('tanda_tangans', function (Blueprint $table) {
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('alat_angkuts', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('jabatans', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('ketentuans', function (Blueprint $table) {
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('pptk_id')->references('id')->on('pegawais');
            $table->foreign('bendahara_id')->references('id')->on('pegawais');
            $table->foreign('pelaksana_administrasi_id')->references('id')->on('pegawais');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('golongans', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('jenis_perdins', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('seksis', function (Blueprint $table) {
            $table->foreign('bidang_id')->references('id')->on('bidangs');
            $table->foreign('author_id')->references('id')->on('users');
        });
        
        Schema::table('provinsis', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('kota_kabupatens', function (Blueprint $table) {
            $table->foreign('provinsi_id')->references('id')->on('provinsis');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('uang_harians', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('uang_transports', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('biaya_perdins', function (Blueprint $table) {
            $table->foreign('area_id')->references('id')->on('jenis_perdins');
            $table->foreign('dari_id')->references('id')->on('kota_kabupatens');
            $table->foreign('ke_id')->references('id')->on('kota_kabupatens');
            $table->foreign('transport_id')->references('id')->on('uang_transports');
            $table->foreign('harian_id')->references('id')->on('uang_harians');
            $table->foreign('author_id')->references('id')->on('users');
        });
        
        Schema::table('data_perdins', function (Blueprint $table) {
            $table->foreign('tanda_tangan_id')->references('id')->on('tanda_tangans');
            $table->foreign('alat_angkut_id')->references('id')->on('alat_angkuts');
            $table->foreign('jenis_perdin_id')->references('id')->on('jenis_perdins');
            $table->foreign('kedudukan_id')->references('id')->on('kota_kabupatens');
            $table->foreign('tujuan_id')->references('id')->on('kota_kabupatens');
            $table->foreign('pegawai_diperintah_id')->references('id')->on('pegawais');
            $table->foreign('status_id')->references('id')->on('status_perdins');
            $table->foreign('laporan_perdin_id')->references('id')->on('laporan_perdins');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('uang_masuks', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });
        
        Schema::table('uang_keluars', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('bidangs');
        Schema::dropIfExists('kegiatans');
        Schema::dropIfExists('pegawais');
        Schema::dropIfExists('tanda_tangans');
        Schema::dropIfExists('alat_angkuts');
        Schema::dropIfExists('jabatans');
        Schema::dropIfExists('ketentuans');
        Schema::dropIfExists('golongans');
        Schema::dropIfExists('jenis_perdins');
        Schema::dropIfExists('provinsis');
        Schema::dropIfExists('seksis');
        Schema::dropIfExists('kota_kabupatens');
        Schema::dropIfExists('uang_harians');
        Schema::dropIfExists('uang_transports');
        Schema::dropIfExists('biaya_perdins');
        Schema::dropIfExists('data_perdins');
        Schema::dropIfExists('data_anggarans');
        Schema::dropIfExists('uang_masuks');
        Schema::dropIfExists('uang_keluars');
    }
};
