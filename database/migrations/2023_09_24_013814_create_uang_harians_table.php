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
        Schema::create('uang_harians', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->string('slug')->unique();
            $table->string('eselon_i');
            $table->string('eselon_ii');
            $table->string('eselon_iii');
            $table->string('eselon_iv');
            $table->string('golongan_iv');
            $table->string('golongan_iii');
            $table->string('golongan_ii');
            $table->string('golongan_i');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uang_harians');
    }
};
