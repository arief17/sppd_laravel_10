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
        Schema::create('data_perdins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surat_dari');
            $table->date('tgl_surat');
            $table->string('perihal');
            $table->unsignedBigInteger('author_id');
            $table->date('tgl_berangkat');
            $table->integer('lama');
            $table->string('lokasi');
            $table->string('jumlah_pegawai');
            $table->string('biaya');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_perdins', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
