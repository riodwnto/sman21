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
        Schema::create('dirgu', function (Blueprint $table) {
            $table->string('id_guru', 10);
            $table->unsignedBigInteger("nip");
            $table->string("nama",255);
            $table->text("matpel");
            $table->text("foto");
            $table->timestamps();

            $table->primary('id_guru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dirgu');
    }
};
