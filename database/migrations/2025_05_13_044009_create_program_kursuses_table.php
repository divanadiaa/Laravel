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
    Schema::create('program_kursuses', function (Blueprint $table) {
        $table->id('id_program');
        $table->string('nama_program');
        $table->string('durasi');
        $table->string('range_biaya');
        $table->foreignId('id_tempat_kursus')->constrained('tempat_kursuses', 'id_tempat_kursus')
              ->onDelete('cascade');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kursuses');
    }
};
