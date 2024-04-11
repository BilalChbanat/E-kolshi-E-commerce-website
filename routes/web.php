<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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



// Dashboard 

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


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
    Route::get('products', [ProductController::class, 'index'])->name('dashboard.products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('dashboard.products.create');
    Route::post('products/create', [ProductController::class, 'store'])->name('dashboard.products.create');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
    Route::put('products/{id}/edit', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::get('products/{id}/delete', [ProductController::class, 'destroy'])->name('dashboard.products.delete');
});


//  Profile 

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::put('/post/{id}', function (string $id) {
    // ...
})->middleware('role:editor');