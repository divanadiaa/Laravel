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
            Schema::create('bookmarks', function (Blueprint $table) {
            $table->id('id_bookmark');
            $table->foreignId('id_pengguna')->constrained('penggunas', 'id_pengguna')
                ->onDelete('cascade');
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
        Schema::dropIfExists('bookmarks');
    }
};
