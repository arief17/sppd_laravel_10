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
        Schema::create('biaya_perdins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('dari');
            $table->unsignedBigInteger('ke');
            $table->unsignedBigInteger('transport');
            $table->unsignedBigInteger('harian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_perdins');
    }
};
