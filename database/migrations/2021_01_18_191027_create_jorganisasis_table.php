<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJorganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jorganisasi', function (Blueprint $table) {
            $table->id();
            $table->longText('niup');
            $table->string('organisasi');
            $table->string('masa_jabatan');
            $table->integer('masa_keanggotaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jorganisasi');
    }
}
