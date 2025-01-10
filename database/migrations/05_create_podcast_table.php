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
        Schema::create('podcast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->bigInteger('author_id')->unsigned();
            $table->text('desc');
            $table->bigInteger('id_genre')->unsigned();
            $table->integer('duration');
            $table->date('release_date');
            $table->string('files');
            $table->string('image');
            $table->timestamps();

            // Relasi dengan tabel users (author)
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');

            // Relasi dengan tabel genre
            $table->foreign('id_genre')->references('id')->on('genre')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podcast');
    }
};
