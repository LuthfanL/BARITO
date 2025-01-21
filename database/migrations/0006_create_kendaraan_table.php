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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->string('platNomor', 11)->primary();
            $table->string('nama', 30);
            $table->integer('jumlahKursi');
            $table->string('tv', 5);
            $table->string('sound', 5);
            $table->string('ac', 5);
            $table->string('deskripsi', 50);
            $table->integer('cc');
            $table->integer('tahunKeluar');
            $table->binary('foto');
            $table->integer('biayaSewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
