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
    Route::get('/product/{id}', [ProductController::class, 'show']); // Retrieve a specific product by ID


//images
    Route::post('/productimage', [ProductImageController::class, 'index']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route:: post('/category/post',[CategoryController::class, 'show']);
