<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('kendaraan_id');
            $table->string('jenis_id');
            $table->string('merk_id');
            $table->string('tipe_id');
            $table->string('nopolisi_id');
            $table->string('tujuan');
            $table->string('kondisi_pengembalian')->nullable();
            $table->string('keterangan');
            
           
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
        Schema::dropIfExists('peminjamans');
    }
}
