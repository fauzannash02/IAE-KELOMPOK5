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
        Schema::create('tiket_transportasi', function (Blueprint $table) {
            $table->id();
            $table->string("id_tiket");
            $table->string("id_transportasi");
            $table->string("nama_pelanggan");
            $table->string("nomor_kursi");
            $table->date("tanggal");
            $table->string("asal_keberangkatan");
            $table->string("tujuan_keberangkatan");
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
        Schema::dropIfExists('tiket_transportasi');
    }
};
