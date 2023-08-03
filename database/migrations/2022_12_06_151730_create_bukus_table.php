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
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('buku_id');
            $table->string('buku_judul');
            $table->string('buku_kode');
            $table->string('buku_penulis');
            $table->string('buku_penerbit');
            $table->string('buku_tahunterbit');
            $table->string('buku_stok');
            $table->text('buku_sinopsis');
            $table->integer('jenis_id');
            $table->integer('rak_id');
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
        Schema::dropIfExists('buku');
    }
};
