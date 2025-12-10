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
        Schema::create('pet_food_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên danh mục đồ ăn
            $table->text('description')->nullable(); // Mô tả danh mục
            $table->string('image')->nullable(); // Hình ảnh danh mục
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_food_categories');
    }
};
