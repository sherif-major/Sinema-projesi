<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_id')->constrained('halls')->cascadeOnDelete();
            $table->string('row_number', 5);
            $table->unsignedInteger('seat_number');
            $table->enum('seat_type', ['standard', 'vip', 'accessible']);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['hall_id', 'row_number', 'seat_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
