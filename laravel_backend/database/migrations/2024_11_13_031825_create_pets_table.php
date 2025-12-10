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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->unsignedBigInteger('category_id'); // Đảm bảo kiểu dữ liệu là unsignedBigInteger
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
