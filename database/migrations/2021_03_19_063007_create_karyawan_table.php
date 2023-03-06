<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('karyawan_id');
            $table->unsignedBigInteger('cuti_id');
            $table->string('no_induk');
            $table->string('nama');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->date('tanggal_bergabung');
            $table->timestamps();


            $table->foreign('cuti_id')->references('id')->on('cuti')
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
        Schema::dropIfExists('karyawan');
    }
}
