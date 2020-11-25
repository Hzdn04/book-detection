<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kategori');
            $table->string('kode_barcode');
            $table->string('nama_buku');
            $table->string('tempat_terbit');
            $table->string('penerbit');
            $table->string('penulis');
            $table->string('tahun_terbit');
            $table->string('editor');
            $table->string('total_halaman');
            $table->string('tempat_buku');
            $table->string('buku_tersedia');
            $table->string('gambar');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori_buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
