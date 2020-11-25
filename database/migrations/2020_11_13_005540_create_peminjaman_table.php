<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_user');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->integer('is_return');
            $table->timestamps();

            $table->foreign('id_buku')->references('id')->on('buku');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
