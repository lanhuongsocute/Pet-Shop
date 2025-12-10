<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',     // Người dùng đặt hàng
        'total_price', // Tổng giá trị đơn hàng
        'status',      // Trạng thái: pending/shipped/delivered
    ];

    // Relationship với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship với OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
