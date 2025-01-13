<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('podcast_id')->unsigned()->onDelete('cascade');
            $table->string('title');
            $table->string('audio_file');
            $table->text('description')->nullable();
            $table->integer('duration')->nullable(); // in seconds
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('episodes');
    }
};
