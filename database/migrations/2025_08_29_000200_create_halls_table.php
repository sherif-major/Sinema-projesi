<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedInteger('capacity');
            $table->unsignedInteger('row_count');
            $table->unsignedInteger('seats_per_row');
            $table->enum('hall_type', ['standard', 'vip', 'imax', 'dolby']);
            $table->string('screen_type', 50)->nullable();
            $table->string('sound_system', 50)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};
