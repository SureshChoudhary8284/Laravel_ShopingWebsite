<?php

namespace App\Http\Controllers;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $product = new Product();
        $product->category_id = 3; // Replace with the actual category_id
        $product->name = ' Jens';
        $product->description = 'This is a formate jens stylis';
        $product->price = 'Rs.600';
        $product->quantity = 200;
        $product->status = 'active';
        $product->save();
        return response()->json(['product' => $product]);
    }
    public function show()
    {
        $products = Product::with('images')->get();
        return view('home', ['products' => $products]);
    }

    public function detail($id){
        $product= Product::find($id);
        return view('product.detail', ['product' => $product]);
    }


    public function searchProducts(Request $request)
    {
        $query = $request->input('query');
    
        // Perform search logic using Eloquent
        $products = Product::where('name', 'like', '%' . $query . '%')
                           ->orWhere('description', 'like', '%' . $query . '%')
                           ->get();
    
        return view('search', compact('products'));
    }
   
   
}