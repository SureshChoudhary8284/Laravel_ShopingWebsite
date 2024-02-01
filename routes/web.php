<?php
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [HomeController::class, 'Adminhome'])->name('admindashboard')
->middleware('is_admin');



// Route::post('/product', [ProductController::class, 'index']); // Retrieve all products
// Route::get('/home', [ProductController::class, 'show']); // Retrieve a specific product by ID
// Route::get('/detail/{id}', [ProductController::class, 'detail']);
// Route::get('/product/search', [ProductController::class, 'searchProducts']);
// Route::get('/productname/search/{category_id}', [ProductController::class, 'searchProductsByParentId']);

// //images
// Route::post('/productimage', [ProductImageController::class, 'index']);
// Route::get('/productimage/show', [ProductImageController::class, 'show']);

// Route::post('/categories', [CategoryController::class, 'index']);


// //cart 
// Route::post('/carts',[CartController::class, 'AddCart']);
// Route::get('/view/cart/',[CartController::class, 'viewcart']);
  
