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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('appointment_date');
            $table->string('status')->default('pending'); // Trạng thái: pending/confirmed/cancelled
            $table->string('image')->nullable(); // Thêm trường hình ảnh (nếu cần lưu hình liên quan đến cuộc hẹn)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
