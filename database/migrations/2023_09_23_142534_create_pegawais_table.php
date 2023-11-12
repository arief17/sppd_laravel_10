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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('no_hp')->unique();
            $table->unsignedBigInteger('seksi_id');
            $table->unsignedBigInteger('golongan_id');
            $table->unsignedBigInteger('pangkat_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->boolean('pptk');
            $table->date('last_perdin')->nullable();
            $table->unsignedBigInteger('ketentuan_id');
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
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
