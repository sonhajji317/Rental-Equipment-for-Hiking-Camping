<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'variant_id',
        'description',
        'price',
        'stock',
        'start_rent',
        'end_rent',
        'status',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function variants()
    // {
    //     return $this->hasMany(Variant::class);
    // }
}
