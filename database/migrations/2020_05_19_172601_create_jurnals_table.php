<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_jurnal');
            $table->integer('debit');
            $table->integer('kredit');
            $table->timestamps();
            //fk
            $table->bigInteger('akun_id')->nullable();
            $table->bigInteger('pengiriman_id')->nullable();
            $table->bigInteger('faktur_id')->nullable();
            $table->bigInteger('retur_id')->nullable();
            $table->bigInteger('pembayaran_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnals');
    }
}
