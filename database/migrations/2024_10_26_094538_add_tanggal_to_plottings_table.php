<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalToPlottingsTable extends Migration
{
    public function up()
    {
        Schema::table('plottings', function (Blueprint $table) {
            $table->date('tanggal')->after('hari'); // Menambahkan kolom tanggal
        });
    }

    public function down()
    {
        Schema::table('plottings', function (Blueprint $table) {
            $table->dropColumn('tanggal'); // Menghapus kolom tanggal saat rollback
        });
    }
}
