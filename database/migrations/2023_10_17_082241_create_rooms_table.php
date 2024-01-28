<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->string('description');
            $table->string('room_name');
            $table->decimal('price');
            $table->integer('bed_numbers');
            $table->integer('adult_max');
            $table->integer('kid_max');
            $table->json('features')->nullable();
            $table->boolean('status')->default=1;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
