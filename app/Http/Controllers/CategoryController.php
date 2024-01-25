<?php

namespace App\Http\Controllers;
 use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Retrieve all categories from the database
     
        $categories = new Category();
        $categories->name = 'Dress';
        $categories->description = 'This is category.';
        $categories->parent_id = null;
        $categories->save();
        return view('home' , ['categories' => $categories]);
    }

    public function categoryshow($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->with('productimage')->get(); // Assuming you have a products relationship in your Category model
    
        return view('categories.categorysearch', compact('category', 'products'));
    }

    public function getProductDetails($id) {
        $products = Product::with('images')
            ->whereHas('category', function ($query) use ($id) {
                $query->where('parent_id', $id);
            })
            ->get();
    
        return response()->json($products);
    }
    
    
    
}
