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
            $table->unsignedInteger('id_user');
            $table->string('nama_murid');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
            $table->string('alamat');
            $table->string('nama_ortu');
            $table->string('no_telp');
            $table->unsignedInteger('id_paket');
            $table->boolean('status_alokasi');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_paket')->references('id_paket')->on('paket')->onDelete('cascade')->onUpdate('cascade');
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
