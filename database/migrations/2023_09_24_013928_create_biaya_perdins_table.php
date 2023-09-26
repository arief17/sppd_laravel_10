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
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('dari');
            $table->unsignedBigInteger('ke');
            $table->unsignedBigInteger('transport');
            $table->unsignedBigInteger('harian');
            $table->unsignedBigInteger('author');
            $table->timestamps();
            $table->boolean('deleted')->default(false);
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
