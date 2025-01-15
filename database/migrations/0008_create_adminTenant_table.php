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
        Schema::create('adminTenant', function (Blueprint $table) {
            $table->char('idAdmin',8)->primary();
            $table->string('name', 30);
            $table->string('email', 50)->unique();
            $table->string('password', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminTenant');
    }
};
