<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/product', [ProductController::class, 'index']); // Retrieve all products
Route::get('/home', [ProductController::class, 'show']); // Retrieve a specific product by ID
Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::get('/product/search', [ProductController::class, 'searchProducts']);
Route::get('/productname/search/{category_id}', [ProductController::class, 'searchProductsByParentId']);
//images
Route::post('/productimage', [ProductImageController::class, 'index']);
Route::get('/productimage/show', [ProductImageController::class, 'show']);

Route::post('/categories', [CategoryController::class, 'index']);


//cart 
Route::post('/carts',[CartController::class, 'AddCart'])->name('product.cart');
Route::get('/view/cart/',[CartController::class, 'viewcart']);
Route::post('/cart/remove/',[CartController::class, 'removeItem'])->name('product.cart');


//order

Route::post('/checkout_order',[OrderController::class,'PlaceOrder'])->name('product.checkout');
Route::post('/checkout_order/{productId}', [OrderController::class, 'Detailorder']);


 //order items

// Route::post('/orderItem',[OrderItemController::class,'OrderItem']);


//address   

Route::post('/checkout/saveaddress',[AddressController::class,'address'])->name('product.checkout');
Route::post('/checkout/saveaddress',[AddressController::class,'saveAddress'])->name('product.checkout');
Route::get('/checkout/showaddress',[AddressController::class,'showaddress'])->name('product.checkout');
