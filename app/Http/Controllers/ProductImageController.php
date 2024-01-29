<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    
     public function index()
     {
         $ProductImage = new ProductImage();
         $ProductImage->product_id = 10; // Replace with the actual category_id
         $ProductImage->name = ' Apple Computer';
         $ProductImage->path = '/img/applecomputer.jpeg';
         $ProductImage->sequence = '11';
         $ProductImage->type ='png|jpg|jpeg';
         $ProductImage->save();
       //  return response()->json(['product' => $ProductImage]);
     }

     public function show()
     {
         $productimage = ProductImage::all();
         return view('home' , ['productimage' => $productimage]);
       
     }
}
 