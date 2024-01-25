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
        $product->category_id = 1; // Replace with the actual category_id
        $product->name = ' Samsung Phone';
        $product->description = 'This is a small and many features';
        $product->price = '6000';
        $product->quantity = 100;
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
                            ->with('images')
                           ->get();
    
        return view('product.search', compact('products'));
    }

    public function searchProductsid($parent_id)
    {
        $products = Product::with('images')
            ->whereHas('category', function ($query) use ($parent_id) {
                $query->where('parent_id', $parent_id);
            })
            ->get();

        return response()->json($products);
    }
   
   
}