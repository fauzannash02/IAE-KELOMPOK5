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
        Schema::create('tiket_app', function (Blueprint $table) {
            $table->id();
            $table->string('id_pelanggan');
            $table->string('nama_pelanggan');
            $table->string('id_tiket_hotel')->nullable();
            $table->string('id_tiket_transportasi')->nullable();
            $table->date('tanggal_pesanan');
            $table->integer('total_harga');
            $table->string('metode_pembayaran');
            $table->date('tanggal_pembayaran'); 
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
        Schema::dropIfExists('tiket_app');
    }
};
