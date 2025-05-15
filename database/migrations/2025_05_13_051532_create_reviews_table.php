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
            Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review');
            $table->integer('rating')->comment('Rating 1-5');
            $table->text('comment');
            $table->foreignId('id_pengguna')->constrained('penggunas', 'id_pengguna')
                ->onDelete('cascade');
            $table->foreignId('id_tempat_kursus')->constrained('tempat_kursuses', 'id_tempat_kursus')
                ->onDelete('cascade');
            $table->timestamps();  // Ini sudah otomatis menambah 'created_at' dan 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
