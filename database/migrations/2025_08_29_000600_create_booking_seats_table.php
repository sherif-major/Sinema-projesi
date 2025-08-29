<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('seat_id')->constrained('seats')->cascadeOnDelete();
            $table->decimal('seat_price', 8, 2);
            $table->timestamps();

            $table->unique(['booking_id', 'seat_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_seats');
    }
};
