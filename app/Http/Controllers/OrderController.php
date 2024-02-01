<?php

namespace App\Http\Controllers;
use App\Models\Cart; 
use App\Models\OrderItem; 
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function placeOrder()
    {
        // Create a new order
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->status = 'pending';

        // Calculate total amount based on cart items
        $order->total_amount = $this->calculateTotalAmount(auth()->user()->id ? auth()->user()->id:0);

        // Save the order to the database
        $order->save();

        // Store order items
        $cartItems = Cart::where('user_id', auth()->user()->id)->get();

        // Attach cart items to the order
        foreach ($cartItems as $cartItem) {
            $order->items()->create([
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
            ]);
        }

        // Remove items from the cart
        Cart::where('user_id', auth()->user()->id)->delete();

        return response()->json($order);
    }

    // Calculate total amount based on cart items
    private function calculateTotalAmount($userId)
    {
        $cartItems = Cart::where('user_id', $userId)->get();
        $totalAmount = 0;

        foreach ($cartItems as $cartItem) {
            // Calculate the total amount by multiplying the quantity and price of each cart item
            $totalAmount += $cartItem->quantity * $cartItem->price;
        }

        return $totalAmount;
    }

    

    
  
}
