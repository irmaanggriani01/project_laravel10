<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            // Menambahkan kolom dosen_wali dan membuat foreign key ke tabel users (atau tabel yang sesuai)
            $table->unsignedBigInteger('dosen_wali')->nullable(); // Kolom ini akan menyimpan ID dosen wali
            $table->foreign('dosen_wali')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            // Menghapus foreign key dan kolom dosen_wali
            $table->dropForeign(['dosen_wali']); // Perbaiki nama kolom
            $table->dropColumn('dosen_wali'); // Perbaiki nama kolom
        });
    }
};
