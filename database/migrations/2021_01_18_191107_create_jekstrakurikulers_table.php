<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJekstrakurikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jekstrakurikuler', function (Blueprint $table) {
            $table->id();
            $table->longText('niup');
            $table->string('asrama');
            $table->string('bidang');
            $table->string('sub_bidang');
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
        Schema::dropIfExists('jekstrakurikuler');
    }
}
