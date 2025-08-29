<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->text('description');
            $table->unsignedInteger('duration'); // minutes
            $table->string('genre', 100);
            $table->string('rating', 10);
            $table->string('director', 100);
            $table->text('cast');
            $table->string('poster_image', 255);
            $table->string('trailer_url', 255)->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
