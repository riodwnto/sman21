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
        Schema::create('dirtu', function (Blueprint $table) {
            $table->string('id_tu', 10);
            $table->unsignedBigInteger("nip");
            $table->string("nama",255);
            $table->text("bagian");
            $table->text("foto");
            $table->timestamps();
            $table->primary('id_tu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dirtu');
    }
};
