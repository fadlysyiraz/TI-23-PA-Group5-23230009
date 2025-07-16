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
        Schema::create('tiket_jawaban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tiket');
            $table->unsignedBigInteger('id_user');
            $table->string('jawaban', 400);
            $table->timestamps();
            $table->foreign('id_tiket')->references('id')->on('tiket')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiket_jawaban');
    }
};
