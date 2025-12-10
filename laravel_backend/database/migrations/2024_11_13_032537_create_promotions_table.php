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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Mã khuyến mãi
            $table->decimal('discount_percentage', 5, 2); // Phần trăm giảm giá
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Thêm trường hình ảnh (nếu cần hình ảnh minh họa khuyến mãi)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
