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
        Schema::create('obat_keluars', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_obat');
            $table->string('nama_pasien');
            $table->smallInteger('jumlah');
            $table->integer('jumlah_pembayaran');
            $table->timestamps();

            $table->foreignId('id_obat')->references('id')->on('obats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_keluars');
    }
};
