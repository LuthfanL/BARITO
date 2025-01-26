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
        Schema::create('pemKendaraan', function (Blueprint $table) {
            $table->id();
            $table->char('idCustomer', 16);
            $table->string('idKendaraan', 30);
            $table->char('idAdmin', 8);
            $table->string('namaPemohon', 30);
            $table->string('noWa', 15);
            $table->string('namaKendaraan', 15);
            $table->string('keperluan', 50);
            $table->string('lokasi', 50);
            $table->string('titikJemput', 50);
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->string('status', 20);
            // $table->string('buktiBayar');
            $table->foreign('idCustomer')->references('NIK')->on('customer')->onDelete('cascade');
            $table->foreign('idKendaraan')->references('platNomor')->on('kendaraan')->onDelete('cascade');
            $table->foreign('idAdmin')->references('idAdmin')->on('adminKendaraan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemKendaraan');
    }
};
