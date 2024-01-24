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
         $ProductImage->name = 'jens';
         $ProductImage->path = '/img/jens.jpeg';
         $ProductImage->sequence = '6';
         $ProductImage->type ='png|jpg|jpeg';
         $ProductImage->save();
         //return view('home' , ['product' => $product]);
         return response()->json(['product' => $ProductImage]);
     }

     public function show()
     {
         $productimage = ProductImage::all();
         return view('home' , ['productimage' => $productimage]);
        //return response()->json($product);
     }
}
 