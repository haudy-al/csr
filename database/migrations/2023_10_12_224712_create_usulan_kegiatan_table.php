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
        Schema::create('usulan_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bidang');
            $table->foreignId('id_member');
            $table->string('nama_kegiatan');
            $table->text('bentuk_kegiatan');
            $table->text('lokasi_kegiatan');
            $table->foreignId('id_kelurahan');
            $table->string('penerima_manfaat');
            $table->date('waktu_pelaksanaan');
            $table->string('anggaran');
            $table->string('proposal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan_kegiatan');
    }
};
