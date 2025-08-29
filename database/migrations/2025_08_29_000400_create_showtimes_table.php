<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->cascadeOnDelete();
            $table->foreignId('hall_id')->constrained('halls')->cascadeOnDelete();
            $table->date('show_date');
            $table->time('show_time');
            $table->decimal('base_price', 8, 2);
            $table->decimal('vip_price', 8, 2)->nullable();
            $table->unsignedInteger('available_seats');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['hall_id', 'show_date', 'show_time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
