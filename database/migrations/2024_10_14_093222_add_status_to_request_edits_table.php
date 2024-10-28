<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('request_edits', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Sesuaikan tipe data dan default sesuai kebutuhan
        });
    }

    public function down()
    {
        Schema::table('request_edits', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

};
