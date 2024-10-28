<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen'); // Kolom untuk nama dosen
            $table->string('nip'); // Kolom untuk NIP
            $table->string('fakultas'); // Kolom untuk fakultas
            $table->string('matakuliah'); // Kolom untuk mata kuliah
            $table->string('no_telp'); // Kolom untuk nomor telepon
            $table->string('peran');
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('post');
    }
}
