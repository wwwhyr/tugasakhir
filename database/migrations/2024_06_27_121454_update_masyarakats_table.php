<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateMasyarakatsTable extends Migration
{
    public function up()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        Schema::table('masyarakats', function (Blueprint $table) {
            // Ubah kolom 'tinggi_badan' dan 'berat_badan' menjadi nullable
            $table->integer('tinggi_badan')->nullable()->change();
            $table->integer('berat_badan')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('masyarakats', function (Blueprint $table) {
            // Kembalikan perubahan nullable 'tinggi_badan' dan 'berat_badan'
            $table->integer('tinggi_badan')->change();
            $table->integer('berat_badan')->change();
        });
    }
}
