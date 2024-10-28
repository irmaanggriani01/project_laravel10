<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelasIdToMahasiswaTable extends Migration
{
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->unsignedBigInteger('kelas_id')->nullable(); // Tambahkan kolom kelas_id

            // Tambahkan foreign key (opsional, jika ada relasi dengan tabel kelas)
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']); // Hapus foreign key
            $table->dropColumn('kelas_id');    // Hapus kolom
        });
    }
}
