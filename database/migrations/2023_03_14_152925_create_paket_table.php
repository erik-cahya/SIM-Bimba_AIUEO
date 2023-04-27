<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->increments('id_paket');
            $table->string('nama_paket');
            $table->string('jenis_paket');
            $table->integer('harga');
            $table->timestamps();
        });
        // Schema::create('paket', function (Blueprint $table) {
        //     $table->increments('id_paket');
        //     $table->unsignedInteger('id_user');
        //     $table->string('nama_paket');
        //     $table->string('jenis_paket');
        //     $table->integer('harga');
        //     $table->timestamps();

        //     $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket');
    }
}
