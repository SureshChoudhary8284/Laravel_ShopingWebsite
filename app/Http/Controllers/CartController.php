<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function AddCart(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
    
        // Check if the user is authenticated
        if (auth()->check()) {
            $user_id = auth()->user()->id;
    
            $cartItems = new Cart();
            $cartItems->user_id = $user_id;
            $cartItems->product_id = $validatedData['product_id'];
            $cartItems->quantity=1;
            $cartItems->status = 'pending';
            $cartItems->save();
            
           return redirect('/api/view/cart/');
            } 
            else
            {
                return redirect()->route('login');
            }
    }
         

    public function viewcart(){
        if(auth()->check()) {
            $cartItems = Cart::where('user_id', auth()->id())->get();
            // Calculate total items in the cart for the user
            //$total = $cartItems->count();
            return view('product.cart', compact('cartItems'));
        } else {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }
    }
    
    

        static function cartItems(){

            $user = Session::get('user');
            $userId = auth()->user() ? auth()->user()->id : 0;
            return Cart::where('user_id', $userId)->count();
            
        }

        
        public function removeItem(Request $request)
        {
            $productId = $request->input('id');
    
            // Assuming you have a Cart model with an 'id' attribute
            $cartItems = Cart::find($productId);
        
            if ($cartItems) {
                $cartItems->delete();
                return redirect('/api/view/cart/');
            }
    
            return view('product.cart'); // Adjust the route name based on your application
        }
    
}

    

            
