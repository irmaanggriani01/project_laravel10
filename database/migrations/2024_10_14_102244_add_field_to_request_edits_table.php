<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToRequestEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_edits', function (Blueprint $table) {
            $table->string('field_to_edit'); // Tambahkan kolom ini
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
            $table->dropColumn('field_to_edit'); // Hapus kolom jika rollback
        });
    }
}
