<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChekoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MollieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

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

// speak about http methods and paths , Controllers and Actions(methods) et pro

//Home
Route::get('/', [HomeController::class, 'index'])->name('/');



//auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('newregister');
Route::post('/login', [AuthController::class, 'login'])->name('newlogin');

Route::get('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'postforgotpassword'])->name('postforgot-password');
Route::get('/reset/{token}', [AuthController::class, 'reset'])->name('reset');
Route::post('/reset/{token}', [AuthController::class, 'postReset']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// Dashboard 

Route::group(['middleware' => ['auth', 'checkrole:admin,seller']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('products', [ProductController::class, 'index'])->name('dashboard.products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('dashboard.products.create');

    Route::post('products/create', [ProductController::class, 'store'])->name('dashboard.products.store'); // Changed the route name to avoid conflict

    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
    Route::put('products/{id}/edit', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::get('products/{id}/delete', [ProductController::class, 'destroy'])->name('dashboard.products.delete');
});

//Product details
Route::get('products/{id}/detail', [ProductController::class, 'show'])->name('dashboard.products.show');

//category
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
    Route::post('categories/create', [CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::put('categories/{id}/edit', [CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::get('categories/{id}/delete', [CategoryController::class, 'destroy'])->name('dashboard.categories.delete');
});

//products
Route::group(['middleware' => ['auth']], function () {

    //cart
    Route::get('cart', [CartController::class, 'index'])->name('shop.cart');
    Route::get('cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('cart/{id}/remove', [CartController::class, 'remove'])->name('cart.remove');

    //wishList
    Route::get('wishlist', [WishListController::class, 'index'])->name('shop.wishlist');
    Route::get('wishlist/{id}/add', [WishListController::class, 'add'])->name('wishlist.add');
    Route::get('wishlist/{id}/remove', [WishListController::class, 'remove'])->name('wishlist.remove');

    //profile 
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

    //payment
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/session', [PaymentController::class, 'session'])->name('session');
    // Route::get('/success/{total}', [PaymentController::class, 'success'])->name('success');
    Route::post('/pay', [PaymentController::class, 'pay'])->name('pay.order');
    Route::get('/success/{total}', [PaymentController::class, 'success'])->name('pay.success');

});




//search and filter 
Route::get('/products/filter', [HomeController::class, 'index'])->name('products.filter.index');
Route::post('/search', [HomeController::class, 'showProducts'])->name('dashboard.products.search');







