<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            // $table->Integer('nis');
            // $table->string('nama_lengkap');
            // $table->string('Jenis Kelamin');
            // $table->string('Tempat Lahir');
            // $table->string('nama');
            // $table->string('nama');
            // $table->string('nama');
            // $table->string('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santri');
    }
}
