<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jurusan');
            $table->string('sub');

        });

        Schema::table('pkilmuan', function (Blueprint $table) {
            $table->integer('peminatan_id')->unsigned()->after('niup');
            $table->foreign('peminatan_id')->references('id')->on('peminatan');
        });

        Schema::table('pskill', function (Blueprint $table) {
            $table->integer('peminatan_id')->unsigned()->after('niup');
            $table->foreign('peminatan_id')->references('id')->on('peminatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminatan');
    }
}
