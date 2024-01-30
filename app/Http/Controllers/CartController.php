<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            // You may add more validation rules as needed
        ]);

        // Create a new cart item
        $cartItem = Cart::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'status' => 'pending', // You may set a default status or handle it differently
        ]);

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Item added to cart successfully', 'data' => $cartItem], 201);
    }

 





















    public function AddCart(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
    
        // Check if the user is authenticated
        if (auth()->check()) {
            $user_id = auth()->user()->id;
    
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->product_id = $validatedData['product_id'];
            $cart->status = 'pending';
    
            $cart->save();
    
            // Redirect the user to another page (e.g., homepage page) after successful cart addition
            return redirect()->route('/api/homepage');
        } else {
            // Redirect the user to the login page
            return redirect()->route('login');
        }
    }
    
    
    
    

    
}
            
