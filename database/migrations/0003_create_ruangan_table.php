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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 30);
            $table->string('lokasi', 50);
            $table->integer('podium');
            $table->integer('meja');
            $table->integer('kursi');
            $table->integer('sound');
            $table->integer('ac');
            $table->integer('proyektor');
            $table->string('luas', 10);
            $table->string('deskripsi', 50);
            $table->integer('lantai');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};
