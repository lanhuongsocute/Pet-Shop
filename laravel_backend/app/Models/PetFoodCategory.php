<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetFoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',        // Tên danh mục
        'description', // Mô tả danh mục
        'image',       // Hình ảnh danh mục
    ];

    // Relationship với bảng PetFood
    public function petFoods()
    {
        return $this->hasMany(PetFood::class, 'category_id');
    }
}
