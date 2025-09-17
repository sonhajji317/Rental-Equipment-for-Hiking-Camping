<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'rental_duration_days',
        'total_price',
        'status_rent',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
