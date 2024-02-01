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
        $categories->name = 'Electronic';
        $categories->description = 'This is Electronic category.';
        $categories->parent_id = 1;
        $categories->save();
    
    }

   
    
    
}
