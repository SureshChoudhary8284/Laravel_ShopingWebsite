<?php

namespace App\Http\Controllers;
use App\Models\Cart; 
use App\Models\OrderItem; 
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function placeOrder()
    {
        $order = new Order();
        $order->user_id = auth()->user()->id ? auth()->user()->id : null;
        $order->status = 'pending';
        $order->total_amount = $this->calculateTotalAmount(auth()->user()->id ? auth()->user()->id : 0);
        $order->save();
        // Remove items from the cart
        Cart::where('user_id', auth()->user()->id)->delete();
        //return response()->json($order);
        
        return view('product.checkout', ['cartItems' => $order]);
    }

    private function calculateTotalAmount($userId)
    {
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            // Calculate the total amount by multiplying the quantity and price of each cart item
            $totalAmount += $item->quantity * $item->product->price;
        }
        return $totalAmount;
    }
  
    public function Detailorder($productId)
    {
        // Retrieve the product based on the provided productId
        $product = Product::find($productId);
        $order = new Order();
        $order->user_id = auth()->user()->id ? auth()->user()->id : null;
        $order->status = 'pending';
        $order->total_amount = $product->price ?? 0;
      //  $order->total_amount = $product->price !== null ? $product->price : null;

        $order->save();
        
        return view('product.checkout', ['cartItems' => $order]);;
    }

    
}
