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
        Schema::create('transaksi_usulan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usulan_kegiatan');
            $table->foreignId('id_member');
            $table->enum('status',['proses','diterima','ditolak'])->default('proses');
            $table->bigInteger('target_sasaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_usulan');
    }
};
