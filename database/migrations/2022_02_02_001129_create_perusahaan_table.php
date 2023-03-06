<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->bigIncrements('perusahaan_id');
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('cuti_id');
            $table->string('nama_perusahaan');
            $table->date('tanggal_gabung_karyawan');
            $table->integer('lama_cuti_karyawan');
            $table->integer('harga');
            $table->string('email');
            $table->string('cover')->nullable()->default(null);
            $table->text('keterangan');
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('karyawan_id')->references('karyawan_id')->on('karyawan') 
            ->onUpdate('CASCADE')
            ->unDelete('CASCADE');
            
            $table->foreign('cuti_id')->references('cuti_id')->on('cuti') 
            ->onUpdate('CASCADE')
            ->unDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
}
