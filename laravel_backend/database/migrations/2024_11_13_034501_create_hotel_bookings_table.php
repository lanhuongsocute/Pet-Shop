<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('check_in_date'); // Ngày nhận
            $table->dateTime('check_out_date'); // Ngày trả
            $table->decimal('price', 10, 2); // Giá
            $table->string('status')->default('pending'); // Trạng thái: pending/confirmed/cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_bookings');
    }
};
