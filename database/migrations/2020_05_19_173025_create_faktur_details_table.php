<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktur_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_detailfaktur')->nullable();
            $table->double('pajak', 8, 3)->nullable();
            $table->integer('jumlah_barang');
            $table->integer('harga');
            $table->string('transactiom_type')->nullable();
            $table->string('kode_transaksi')->nullable();
            $table->timestamps();
            //fk
            $table->bigInteger('faktur_id')->nullable();
            $table->bigInteger('barang_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faktur_details');
    }
}
