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
            $table->boolean('pptk');
            $table->string('ruang');
            $table->unsignedBigInteger('eselon');
            $table->unsignedBigInteger('jabatan');
            $table->date('last_perdin');
            $table->unsignedBigInteger('author');
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
