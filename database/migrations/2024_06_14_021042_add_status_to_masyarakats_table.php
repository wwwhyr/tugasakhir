<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToMasyarakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('masyarakats', function (Blueprint $table) {
        $table->string('status')->nullable();
    });
}

public function down()
{
    Schema::table('masyarakats', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
}
