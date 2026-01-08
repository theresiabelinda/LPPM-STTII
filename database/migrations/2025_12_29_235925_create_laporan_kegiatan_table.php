<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_kegiatan', function (Blueprint $table) {
            $table->integer('id_laporan')->autoIncrement(); // Primary Key
            $table->string('nama_ketua');
            $table->unsignedBigInteger('id_dosen');
            $table->integer('id_kategori_kegiatan');
            $table->foreign('id_kategori_kegiatan')->references('id_kategori_kegiatan')->on('kategori_kegiatan');
            $table->integer('tahun');
            $table->string('lokasi');
            $table->string('judul');
            $table->string('file_pdf');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_kegiatan');
    }
};
