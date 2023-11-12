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
        Schema::create('uang_transports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('eselon_i');
            $table->string('eselon_ii');
            $table->string('eselon_iii');
            $table->string('eselon_iv');
            $table->string('golongan_iv');
            $table->string('golongan_iii');
            $table->string('golongan_ii');
            $table->string('golongan_i');
            $table->unsignedBigInteger('wilayah_id');
            $table->unsignedBigInteger('alat_angkut_id');
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
        Schema::table('uang_transports', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
