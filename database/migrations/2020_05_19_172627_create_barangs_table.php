<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_barang');
            $table->string('kategori_barang');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->integer('harga_barang');
            $table->string('gambar')->nullable();
            $table->timestamps();
            //fk
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('pajak_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
