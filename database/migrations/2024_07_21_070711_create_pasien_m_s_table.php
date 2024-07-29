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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("nik")->unique();
            $table->string("nama_pasien");
            $table->integer("umur");
            $table->string("no_hp");
            $table->string("alamat");
            $table->date("tanggal_lahir");
            $table->string("berat_badan");
            $table->string("tinggi_badan");
            $table->string("nama_ibukandung");
            $table->string("nama_ayahkandung");
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
        Schema::dropIfExists('pasien');
    }
};
