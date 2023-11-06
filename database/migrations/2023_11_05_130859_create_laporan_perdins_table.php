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
        Schema::create('laporan_perdins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('maksud1')->nullable();
            $table->text('maksud2')->nullable();
            $table->text('maksud3')->nullable();
            $table->text('kegiatan1')->nullable();
            $table->text('kegiatan2')->nullable();
            $table->text('kegiatan3')->nullable();
            $table->text('hasil1')->nullable();
            $table->text('hasil2')->nullable();
            $table->text('hasil3')->nullable();
            $table->text('kesimpulan1')->nullable();
            $table->text('kesimpulan2')->nullable();
            $table->text('kesimpulan3')->nullable();
            $table->string('file_laporan')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_perdins', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
