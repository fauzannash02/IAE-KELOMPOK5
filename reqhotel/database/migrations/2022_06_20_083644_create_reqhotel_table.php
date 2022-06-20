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
        Schema::create('reqhotel', function (Blueprint $table) {
            $table->id();
            $table->string('id_kamar');
            $table->string('nama_kamar');
            $table->longText('fasilitas_kamar');
            $table->integer('harga_kamar');
            $table->integer('jumlah_kamar');
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
        Schema::dropIfExists('reqhotel');
    }
};
