<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetFood extends Model
{
    use HasFactory;

    // Đảm bảo tên bảng được khai báo đúng
    protected $table = 'pet_foods';

    // Nếu cần, bạn có thể khai báo các cột được phép thêm hoặc sửa
    protected $fillable = ['name', 'type', 'price', 'description', 'image', 'category_id'];

    // Mối quan hệ với danh mục thức ăn
    public function category()
    {
        return $this->belongsTo(PetFoodCategory::class, 'category_id');
    }
}
