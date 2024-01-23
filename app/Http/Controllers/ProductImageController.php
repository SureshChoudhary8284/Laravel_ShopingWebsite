<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    
     public function index()
     {
         $ProductImage = new ProductImage();
         $ProductImage->product_id = 12; // Replace with the actual category_id
         $ProductImage->name = 'Shirt';
         $ProductImage->path = '/img/shirt.jpeg';
         $ProductImage->sequence = '5';
         $ProductImage->type ='png|jpg|jpeg';
         $ProductImage->save();
         //return view('home' , ['product' => $product]);
         return response()->json(['product' => $ProductImage]);
     }
}
 