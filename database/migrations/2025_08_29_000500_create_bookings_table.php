<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('showtime_id')->constrained('showtimes')->cascadeOnDelete();
            $table->string('customer_name', 100);
            $table->string('customer_email', 255);
            $table->string('customer_phone', 20)->nullable();
            $table->decimal('total_price', 8, 2);
            $table->enum('booking_status', ['pending', 'confirmed', 'cancelled', 'refunded'])->default('pending');
            $table->string('booking_code', 20)->unique();
            $table->string('payment_method', 50)->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->string('qr_code', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
