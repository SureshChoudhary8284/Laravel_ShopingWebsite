<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'status', 'total_amount'];

    public function user()  
    {
       return $this->belongsTo(User::class, 'user_id');
    }


    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class , 'order_id');
    }
}

