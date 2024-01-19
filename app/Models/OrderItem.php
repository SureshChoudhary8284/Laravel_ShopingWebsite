<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_name', 'category_name', 'amount', 'quantity'];

    public function order()  
    {
       return $this->belongsTo(Order::class, 'order_id');
    }
 
    public function product()  
    {
       return $this->belongsTo(Product::class, 'product_name');
    }

    public function category()  
    {
       return $this->belongsTo(Category::class, 'category_name');
    }

}

