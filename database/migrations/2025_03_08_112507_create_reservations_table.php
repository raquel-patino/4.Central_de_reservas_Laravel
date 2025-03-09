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
        Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        $table->string('room_type');
        $table->date('check_in');
        $table->date('check_out');
        $table->integer('number_guests');
        $table->double('price', 8, 2);
        $table->foreignId('user_id')->constrained('users');
        $table->foreignId('hotel_id')->constrained('hotels');
        $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
