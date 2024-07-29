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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pasien");
            $table->string("keluhan");
            $table->unsignedBigInteger("id_rawat");
            $table->unsignedBigInteger("id_obat");
            $table->unsignedBigInteger("id_layanan");
            $table->integer("total_bayar");
            $table->integer("uang_bayar");
            $table->integer("uang_kembali");
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->foreign('id_obat')->references('id')->on('obat');
            $table->foreign('id_layanan')->references('id')->on('layanan');
            $table->foreign('id_rawat')->references('id')->on('rawat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
