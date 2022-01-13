<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchaseController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUser;

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
    return redirect('/home');
});

Route::get('/home',  [ProductController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Auth::routes();

Route::post('register', [UserController::class, 'store']);

Route::get('/product-detail/{item_id}', [ProductController::class, 'show']);

Route::get('/search-product', [ProductController::class, 'searchHome']);

Route::post('/search-product', [ProductController::class, 'search'])->name('search-product');

Route::middleware(CheckAdmin::class)->group(function () {
    Route::get('/insert-product', function () {
        return view('insertproduct');
    })->name('insert-product');
    Route::post('/insert-product', [ProductController::class, 'store'])->name('insert-product-data');
    Route::get('/update-product/{item_id}', [ProductController::class, 'edit']);
    Route::get('/manage-user', [UserController::class, 'index'])->name('get-user');
    Route::patch('/update-product/{item_id}', [ProductController::class, 'update'])->name('update-product-data');
    Route::delete('/manage-user/{user_id}', [UserController::class, 'destroy'])->name('delete-user');
});

Route::middleware(CheckUser::class)->group(function () {
    Route::get('/update-profile/{user_id}', [UserController::class, 'show']);
    Route::patch('/update-profile/{user_id}', [UserController::class, 'update'])->name('update-profile');
    Route::post('/product-detail', [CartController::class, 'store'])->name('store-cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{cart_id}', [CartController::class, 'destroy'])->name('remove-cart');
    Route::post('/cart', [PurchaseController::class, 'store'])->name('purchase');
    Route::get('/transaction-history', [PurchaseController::class, 'index']);
    Route::post('/transaction-detail/{transaction_header_id}', [PurchaseController::class, 'show'])->name('purchase-detail');
});

