<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{

  public function OrderItem()
{
    // Assuming you have an OrderItem model
    $orderItem = new OrderItem();

    $order = Order::find('id'); // Replace $orderId with the actual ID of the order

    // Check if the order exists
    if (!$order) {
        return response()->json(['error' => 'Order not found'], 404);
    }

    // Find the product based on its name
    $product = Product::where('product_name')->first(); // Replace $product_name with the actual product name

    // Check if the product exists
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    // Find the category based on its name
    $category = Category::where('category_name')->first(); // Replace $categoryName with the actual category name

    // Check if the category exists
    if (!$category) {
        return response()->json(['error' => 'Category not found'], 404);
    }

    // Find the cart based on its ID
    $cart = Cart::find('id'); // Replace $cartId with the actual ID of the cart

    // Check if the cart exists
    if (!$cart) {
        return response()->json(['error' => 'Cart not found'], 404);
    }

    // Set the attributes of the OrderItem
    $orderItem->order_id = $order->id;
    $orderItem->product_id = $product->id;
    $orderItem->category_id = $category->id;
    $orderItem->amount = $order->amount;
    $orderItem->quantity = $cart->quantity;

    // Save the OrderItem
    $orderItem->save();

    // Return a response or redirect as needed
    return response()->json($orderItem);
}

    

    


}
