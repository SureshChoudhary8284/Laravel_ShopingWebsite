<?php

namespace App\Models;
use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description', 'price', 'quantity', 'status'];

    
    public function category()  
    {
       return $this->belongsTo(Category::class, 'category_id');
    }


    public function productImage()
    {
        return $this->hasMany(ProductImage::class , 'product_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class , 'product_name');
    }


}
