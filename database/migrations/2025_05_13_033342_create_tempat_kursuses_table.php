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
    Schema::create('tempat_kursuses', function (Blueprint $table) {
        $table->id('id_tempat_kursus');
        $table->string('gambar')->nullable(); // Menambahkan kolom gambar
        $table->string('nama_tempat_kursus');
        $table->text('deskripsi_tempat_kursus');
        $table->string('lokasi');
        $table->string('maps')->nullable();
        $table->string('kontak_kursus');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_kursuses');
    }
};
