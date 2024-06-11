<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaerahsTable extends Migration
{
    public function up()
    {
        Schema::create('daerahs', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->string('desa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daerahs');
    }
}


