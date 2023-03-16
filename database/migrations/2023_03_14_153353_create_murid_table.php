<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murid', function (Blueprint $table) {
            $table->increments('id_murid');
            $table->string('nama_murid');
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
            $table->string('alamat');
            $table->string('nama_ortu');
            $table->string('no_telp');
            $table->string('nama_paket');
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
        Schema::dropIfExists('murid');
    }
}