<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('namapegawai');
            $table->bigInteger('nip');
            $table->string('password');
            $table->string('alamat');
            $table->string('jeniskelamin');
            $table->string('email');
            $table->bigInteger('nohp');
            $table->string('foto');
            // $table->string('id_nopolisi');
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
        Schema::dropIfExists('pegawais');
    }
}
