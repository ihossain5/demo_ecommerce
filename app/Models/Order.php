<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id',
        'payment_method',
        'name', 'address',
        'email', 'city',
        'phone', 'quantity',
        'price', 'discount',
        'total_price',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
