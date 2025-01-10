<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('history_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('history_id')->unsigned();
            $table->foreignId('history_id')->unsigned()->onDelete('cascade');
            $table->bigInteger('id_podcast')->unsigned();
            $table->timestamps();

            // Relasi dengan tabel history
            // $table->foreign('history_id')->references('id')->on('history')->onDelete('cascade');

            // Relasi dengan tabel podcast
            $table->foreign('id_podcast')->references('id')->on('podcast')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_item');
    }
};
