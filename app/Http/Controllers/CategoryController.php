<?php

namespace App\Http\Controllers;
 use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
    

    }
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

    public function categoryshow()
    {
      $categories = Category::all();
      return response()->json(['categories' => $categories]);
        //  return view('home' , ['categories' => $categories]);
    }
}
