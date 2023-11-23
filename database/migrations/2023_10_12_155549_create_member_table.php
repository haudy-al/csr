<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('email_perusahaan');
            $table->string('nama_kontak_person');
            $table->string('no_telepon_person');
            $table->string('no_telepon_perusahaan');
            $table->foreignId('id_kategori_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('latitude');
            $table->string('longitude');
            $table->foreignId('id_kelurahan')->nullable();
            $table->string('gambar_perusahaan');
            $table->string('username');
            $table->string('password');
            $table->text('token')->nullable();
            $table->enum('level',['pd','cp'])->default('cp');
            $table->enum('status',['0','1'])->default('0');
            $table->date('password_expire')->default('1999-01-01');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
