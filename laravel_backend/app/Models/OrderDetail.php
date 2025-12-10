<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',       // Đơn hàng
        'pet_food_id',    // Sản phẩm đồ ăn thú cưng (nếu có)
        'pet_clothes_id', // Sản phẩm thời trang thú cưng (nếu có)
        'quantity',       // Số lượng
        'price',          // Giá mỗi sản phẩm
    ];

    // Relationship với Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relationship với PetFood
    public function petFood()
    {
        return $this->belongsTo(PetFood::class);
    }

    // Relationship với PetClothes
    public function petClothes()
    {
        return $this->belongsTo(PetClothes::class);
    }
}
