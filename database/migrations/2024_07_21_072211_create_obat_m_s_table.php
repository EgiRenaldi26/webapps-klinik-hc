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
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string("nama_obat");
            $table->integer("harga_obat");
            $table->integer("stok");
            $table->string("dosis");
            $table->string("fungsi");
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
        Schema::dropIfExists('obat_m_s');
    }
};
