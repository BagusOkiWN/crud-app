<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai');
            $table->string('nik');
            $table->biginteger('jenis_pegawai_id')->unsigned();
            $table->biginteger('status_pegawai_id')->unsigned();
            $table->string('unit');
            $table->string('sub_unit');
            $table->biginteger('pendidikan_id')->unsigned();
            $table->string('tgl_lahir');
            $table->string('tpt_lahir');
            $table->biginteger('jenkel_id')->unsigned();
            $table->biginteger('agama_id')->unsigned();
            $table->foreign('agama_id')->references('id')->on('agama');
            $table->foreign('jenis_pegawai_id')->references('id')->on('jenis_pegawai');
            $table->foreign('status_pegawai_id')->references('id')->on('status_pegawai');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikan');
            $table->foreign('jenkel_id')->references('id')->on('jenis_kelamin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
