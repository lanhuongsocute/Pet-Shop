<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'code',                // Mã khuyến mãi
        'discount_percentage', // Phần trăm giảm giá
        'start_date',          // Ngày bắt đầu
        'end_date',            // Ngày kết thúc
        'description',         // Mô tả
        'image',               // Hình ảnh khuyến mãi
    ];

    // Các accessor/mutator có thể thêm tại đây nếu cần (ví dụ định dạng ngày, số, ...)
}
