<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addCart($user_id, $product_id){

        // Find the user and product by their IDs
        $user = User::find($user_id);
        $product = Product::find($product_id);
    
        // Check if both user and product records exist
        if ($user && $product) {
            // Create a new Cart instance and set user and product relationships
            $cart = new Cart;
            $cart->status = 'active'; // Replace 'active' with the desired status for the cart
    
            // Set up the relationships
            $cart->user()->associate($user);
            $cart->product()->associate($product);
    
            $cart->save();
        } else {
            echo 'Invalid user or product';
        }
    }
    
}
            
