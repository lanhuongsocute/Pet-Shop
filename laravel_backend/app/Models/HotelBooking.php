<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',       // Người dùng đặt
        'pet_id',        // Thú cưng
        'check_in_date', // Ngày nhận
        'check_out_date', // Ngày trả
        'price',         // Giá
        'status',        // Trạng thái: pending/confirmed/cancelled
    ];

    // Relationship với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship với Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
