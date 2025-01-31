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
        Schema::create('pemRuangan', function (Blueprint $table) {
            $table->id();
            $table->char('idCustomer', 16);
            $table->unsignedBigInteger('idRuangan');
            $table->char('idAdmin', 8);
            $table->string('namaPemohon', 30);
            $table->string('noWa', 15);
            $table->string('namaRuangan', 30);
            $table->string('keperluan', 50);
            $table->string('keterangan', 50);
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->string('status', 20);
            $table->string('buktiBayar')->nullable();
            $table->foreign('idCustomer')->references('NIK')->on('customer')->onDelete('cascade');
            $table->foreign('idRuangan')->references('id')->on('ruangan')->onDelete('cascade');
            $table->foreign('idAdmin')->references('idAdmin')->on('adminRuangan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemRuangan');
    }
};
