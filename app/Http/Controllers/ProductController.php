<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{

    public function index()
    {
        $product = new Product();
        $product->category_id = 2; // Replace with the actual category_id
        $product->name = ' Samsung Phone';
        $product->description = 'This is a small and many features';
        $product->price = '60000';
        $product->quantity = 100;
        $product->status = 'active';
        $product->save();
     // return response()->json(['product' => $product]);
    }
    public function show()
    {
        $products = Product::with('images')->get();
        return view('home', ['products' => $products]);
    }

    public function detail($id)
    {
        $product = Product::with('Category', 'images')->find($id);

        return view('product.detail', ['product' => $product]);
    }

    

    public function searchProducts(Request $request)
    {
        $query = $request->input('query');
    
        // Perform search logic using Eloquent
        $products = Product::where('name', 'like', '%' . $query . '%')
                           ->orWhere('description', 'like', '%' . $query . '%')
                            ->with('images')
                           ->get();
    
        return view('product.search', compact('products'));
    }

    public function searchProductsByParentId($category_id)
    {
        // Perform search logic using Eloquent
        $products = Product::where('category_id', $category_id)
                        ->with('images')
                        ->get();  

        return view('product.search', compact('products'));
    }
      

    
}