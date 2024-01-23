<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $product = new Product();
        $product->category_id = 3; // Replace with the actual category_id
        $product->name = ' Jens';
        $product->description = 'This is a formate jens stylis';
        $product->price = '600';
        $product->quantity = 200;
        $product->status = 'active';
        $product->save();
        //return view('home' , ['product' => $product]);
        return response()->json(['product' => $product]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
// }
    // public function index()
    // {
    //     $data= Product::all();
    //     return view('product.index' , compact('products'));
    // }

    // public function create()
    // {
    //     return view('product.create');
    // }

    // public function store()
    // {
    //     return view('product.create');
    // }
}