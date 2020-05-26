<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranPiutangDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_piutang_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total');
            $table->timestamps();
            //fk
            $table->bigInteger('pembayaran_id')->nullable();
            $table->bigInteger('piutang_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_piutang_details');
    }
}
