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
            $table->string('idKendaraan', 3);
            $table->char('idAdmin', 8);
            $table->date('tglPeminjaman');
            $table->date('tglSelesai');
            $table->string('status', 8);
            $table->string('buktiBayar');
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
