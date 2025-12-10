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
        Schema::create('support_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_info');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Thêm trường hình ảnh (nếu cần hình ảnh minh họa cho dịch vụ)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_services');
    }
};
