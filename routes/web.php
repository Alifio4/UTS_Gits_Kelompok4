<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


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
    return view('landing');
});

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('isTamu');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('isTamu');
Route::post('/register', [AuthController::class, 'doRegister'])->name('doRegister')->middleware('isTamu');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin')->middleware('isTamu');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('isTamu');


// Route::middleware(['auth'])->group(function () {
// });
Route::get('/product', [ProductController::class, 'index'])->name('home');
// Route::get('/', [ProductController::class, 'index']);
Route::get('/product/add', [ProductController::class, 'create'])->middleware('isLogin');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->middleware('isLogin');
Route::get('/product/{id}/delete', [ProductController::class, 'destroy'])->middleware('isLogin');
Route::post('/product', [ProductController::class, 'store'])->middleware('isLogin');
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('isLogin');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('isLogin');
Route::post('/category/created', [CategoryController::class, 'store'])->name('category.store')->middleware('isLogin');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit')->middleware('isLogin');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('isLogin');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('isLogin');

Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
    Route::get('{id}/store', [CartController::class, 'store'])->name('store');
    Route::get('{id}/add', [CartController::class, 'add'])->name('add');
    Route::get('{id}/subtract', [CartController::class, 'subtract'])->name('subtract');
    Route::get('{id}/destroy', [CartController::class, 'destroy'])->name('destroy');
    Route::get('checkout', [CartController::class, 'index']);
    // Route::post('pay', [CartController::class, 'pay'])->name('pay');
    })->middleware('isLogin');

