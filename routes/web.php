<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('newregister');
Route::post('/login', [AuthController::class, 'login'])->name('newlogin');

Route::get('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'postforgotpassword'])->name('postforgot-password');
Route::get('/reset/{token}', [AuthController::class, 'reset'])->name('reset');
Route::post('/reset/{token}', [AuthController::class, 'postReset']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');