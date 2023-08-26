<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 2048);
            $table->text('subtitle')->nullable();
            $table->longText('content');
            $table->date('date');
            $table->string('source_url', 2048)->nullable();
            $table->string('track_url', 2048)->nullable();
            $table->foreignId('author_id')->constrained('authors');
            $table->string('default_locale', 5);
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stories');
    }
};
