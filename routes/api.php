<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
    Route::get('/product/show', [ProductController::class, 'show']); // Retrieve a specific product by ID
    Route::get('/detail/{id}', [ProductController::class, 'detail']);
    Route::get('/product/search', [ProductController::class, 'searchProducts']);
    Route::get('/product/search/{parent_id}', [ProductController::class, 'searchProductsid']);

//images
    Route::post('/productimage', [ProductImageController::class, 'index']);
    Route::get('/productimage/show', [ProductImageController::class, 'show']);

    Route::post('/categories', [CategoryController::class, 'index']);
   // Route:: get('/categories/{id}',[CategoryController::class, 'categoryshow']);

    Route::get('/get-product-details/{categoryId}', [CategoryController::class, 'getProductDetails']);
     //Route::get('/categories/{id}', [CategoryController::class, 'show']);
  //  Route::get('/category/search',[CategoryController::class,'categorysearch']);
