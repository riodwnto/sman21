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
        Schema::create('content', function (Blueprint $table) {
            $table->id('content_id');
            $table->string('content_img',50);
            $table->string('content_judul',50);
            $table->string('content_deskripsi',200);
            $table->string('content_kategori',50);
            $table->string('content_url',50);
            $table->enum('content_status',['Aktif','Non-Aktif']);
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
        Schema::dropIfExists('content');
    }
};
