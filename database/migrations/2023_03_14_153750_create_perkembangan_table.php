<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkembanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkembangan', function (Blueprint $table) {
            $table->increments('id_perkembangan');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_murid');
            $table->date('tgl_perkembangan');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_murid')->references('id_murid')->on('murid')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perkembangan');
    }
}
