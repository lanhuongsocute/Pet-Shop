<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportService extends Model
{
    use HasFactory;

    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'name',          // Tên dịch vụ hỗ trợ
        'contact_info',  // Thông tin liên hệ
        'description',   // Mô tả dịch vụ
        'image',         // Hình ảnh minh họa
    ];
}
