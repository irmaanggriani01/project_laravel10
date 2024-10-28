<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlottingsTable extends Migration
{
    public function up()
    {
        Schema::create('plottings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained('post')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
            $table->string('hari'); // Add string field for dayphp artisan migrate
            $table->time('waktu_mulai'); // Add time field for start time
            $table->time('waktu_selesai'); // Add time field for end time
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plottings');
    }
}
