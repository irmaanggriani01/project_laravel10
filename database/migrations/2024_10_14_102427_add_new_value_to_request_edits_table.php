<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewValueToRequestEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_edits', function (Blueprint $table) {
            $table->string('new_value'); // Tambahkan kolom ini
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
     {
        Schema::table('request_edits', function (Blueprint $table) {
            $table->dropColumn('new_value'); // Hapus kolom jika rollback
        });
    }
}
