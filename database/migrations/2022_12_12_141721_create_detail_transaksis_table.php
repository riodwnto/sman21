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
        Schema::create('detailtransaksi', function (Blueprint $table) {
            $table->increments('detailtransaksi_id');
            $table->integer('transaksi_id');
            $table->integer('buku_id');
            $table->integer('detailtransaksi_jumlah');
            $table->date('detailtransaksi_tglpinjam');
            $table->date('detailtransaksi_tglkembali');
            $table->string('detailtransaksi_status',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailtransaksi');
    }
};
