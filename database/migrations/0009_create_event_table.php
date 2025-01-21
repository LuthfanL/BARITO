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
        Schema::create('event', function (Blueprint $table) {
            $table->string('namaEvent', 50)->primary();
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->integer('nMakanan');
            $table->integer('nBarang');
            $table->integer('nJasa');
            $table->string('deskripsi', 255);
            $table->string('foto');
            $table->integer('hargaTenant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
