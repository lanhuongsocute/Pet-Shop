<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pet_foods', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('description');
            $table->foreign('category_id')->references('id')->on('pet_food_categories')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('pet_foods', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
