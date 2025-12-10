<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetClothes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',        // Tên trang phục
        'price',       // Giá
        'description', // Mô tả
        'image',       // Hình ảnh
    ];
}
