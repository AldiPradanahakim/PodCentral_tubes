<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('podcasts');
    }
}
