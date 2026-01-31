<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // ⭐ これを追加！
    protected $fillable = [
        'new_name',
        'description',
        'price',
        'stock',
        'is_published',
        'category_id',
    ];
}
