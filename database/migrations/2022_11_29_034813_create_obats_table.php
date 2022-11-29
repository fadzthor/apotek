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
        Schema::create('obats', function (Blueprint $table) {
            $table->id(); // big int
            $table->string('nama_obat'); // varchar
            // unsigned valuenya tidak berubah menjadi negatif
            // $table->bigInteger('id_jenis_obat')->comment('relasi dengan table jenis obat');
            $table->integer('stok'); // big int
            $table->integer('harga'); // big int
            $table->string('gambar')->nullable(); // bisa kosong
            $table->date('tanggal_kadaluarsa');
            $table->timestamps();

            // Relasi dengan jenis obat dimana id jenis obat mereferensi ke id di table jenis obat dengan update dan delete cascade (ketika jenis obat dihapus data obat akan ikut terhapus)
            $table->foreignId('id_jenis_obat')->references('id')->on('jenis_obats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obats');
    }
};
