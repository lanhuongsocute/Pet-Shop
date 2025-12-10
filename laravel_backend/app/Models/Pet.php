<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'category_id',
        'description',
        'price',
        'image', // Trường hình ảnh
    ];

    public function category()
    {
        return $this->belongsTo(PetCategory::class, 'category_id');
    }
}
