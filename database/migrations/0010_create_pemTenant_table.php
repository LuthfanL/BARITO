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
        Schema::create('pemTenant', function (Blueprint $table) {
            $table->id();
            $table->char('idCustomer', 16);
            $table->string('namaEvent', 50);
            $table->char('idAdmin', 8);
            $table->string('namaPemohon', 30);
            $table->string('noWa', 15);
            $table->string('namaTenant', 30);
            $table->string('tipeTenant', 30);
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->string('status', 20);
            //$table->string('buktiBayar');
            $table->foreign('idCustomer')->references('NIK')->on('customer')->onDelete('cascade');
            $table->foreign('namaEvent')->references('namaEvent')->on('event')->onDelete('cascade');
            $table->foreign('idAdmin')->references('idAdmin')->on('adminTenant')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemTenant');
    }
};
