<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFungsiTerbilangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fungsi_terbilang', function (Blueprint $table) {
            $table->bigIncrements('terbilang_id');
            $table->unsignedBigInteger('tanggal_transaksi');
            $table->time('jam');
            $table->string('kode_barang');
            $table->string('nama');
            $table->integer('qty');
            $table->string('harga');
            $table->string('total');
            $table->text('terbilang');
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
        Schema::dropIfExists('fungsi_terbilang');
    }
}
