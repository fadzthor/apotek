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
        Schema::create('obat_masuks', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_obat');
            $table->string('distributor');
            $table->date('tanggal_masuk');
            $table->integer('jumlah');
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
        Schema::dropIfExists('obat_masuks');
    }
};
