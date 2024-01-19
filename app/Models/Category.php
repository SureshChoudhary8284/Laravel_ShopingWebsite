<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'parent_id'];

    
    public function product()
    {
        return $this->hasMany(Product::class , 'parent_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class , 'category_name');
    }

}
