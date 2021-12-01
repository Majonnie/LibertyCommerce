<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserAvatarController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    
    //Admin
    Route::middleware('admin')->group(function() {

        Route::get('/admin', function () {
            return view('admin');
        });
    
        Route::post('/admin', [ProductController::class, 'store']);

        Route::put('/modifyproduct', [ProductController::class, 'modify']);
        Route::put('/deleteproduct', [ProductController::class, 'delete']);
        Route::get('/control', function () {
            return view('control');
        });
    });

    //Cart
    Route::get('/cart', function () {
        $cart_items = DB::table('users_has_products')->where('user_id', auth()->user()->id)->get();
        $cart_items_sorted = DB::table('users_has_products')->where('user_id', auth()->user()->id)->distinct()->get();
        $products = DB::table('products')->get();
        return view('cart', ['cart_items' => $cart_items, 'cart_items_sorted' => $cart_items_sorted, 'products' => $products]);
    });

    Route::post('/cart', [ProductController::class, 'addToCart']);

    Route::post('/removeproduct', [ProductController::class, 'removeFromCart']);
    
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::post('/order', [ProductController::class, 'order']);

    Route::get('/order', function () {
        return view('order');
    });

    //Profile
    Route::get('/profile', [ViewController::class, 'profile']);

    Route::get('/profile_edit', function () {
        return view('profile_edit');
    });

    Route::put('/modifyuser', [UserController::class, 'modify']);
});

Route::middleware('guest')->group(function (){

    //Accounts
    Route::get('/register', function () {
        return view('register');
    })->name('register');
    
    Route::post('/register', [UserController::class, 'store']);
    
    Route::get('/login', function () {
        return view('login');
    })->name("login");
    
    Route::post('/login', [LoginController::class, 'authenticate']);
    
    Route::get('/reset', function () {
        return view('reset');
    });
    
    Route::post('/reset', [ResetController::class, 'reset']);
    
    Route::get('/reset-password/{token}', function ($token) {
        return view('reset', ['token' => $token]);
    })->name('password.reset');
});

//Site
Route::get('/catalogue', function () {
    $products = DB::table('products')->orderBy('name')->get();

    return view('catalogue', ['products' => $products]);
});

Route::get('/catalogue/{category}', function ($category) {
    $products = DB::table('products')->orderBy('name')->get();

    return view('catalogue', ['products' => $products, 'category' => $category]);
});

Route::get('/product/{id}', function ($id) {
    $product = DB::table('products')->find($id);

    return view('product', ['product' => $product]);
});
