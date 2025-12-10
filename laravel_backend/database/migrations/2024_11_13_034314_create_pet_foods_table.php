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
        Schema::create('pet_foods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên đồ ăn
            $table->decimal('price', 8, 2); // Giá
            $table->text('description')->nullable(); // Mô tả
            $table->string('image')->nullable(); // Hình ảnh đồ ăn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_foods');
    }
};
