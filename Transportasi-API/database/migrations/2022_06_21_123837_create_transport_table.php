<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport', function (Blueprint $table) {
            $table->id();
            $table->string('IDTransportasi');
            $table->string('IDRute');
            $table->string('IDJadwal');
            $table->string('IDClass');
            $table->string('Armada');
            $table->string('RutedanTujuan');
            $table->string('JadwalKeberangkatan');
            $table->string('JumlahSeat');
            $table->string('TipeClass');
            $table->string('Harga');
            $table->softDeletes();
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
        Schema::dropIfExists('transport');
    }
};
