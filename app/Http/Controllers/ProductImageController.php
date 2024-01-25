<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    
     public function index()
     {
         $ProductImage = new ProductImage();
         $ProductImage->product_id = 17; // Replace with the actual category_id
         $ProductImage->name = ' Dell Mobile';
         $ProductImage->path = '/img/dell.jpeg';
         $ProductImage->sequence = '10';
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
 