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
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'doRegister'])->name('doRegister');
Route::post('/login', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('auth.home');
    })->name('home');
    //halaman disini
});

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/', [ProductController::class, 'index']);
Route::get('/product/add', [ProductController::class, 'create']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::get('/product/{id}/delete', [ProductController::class, 'destroy']);
Route::post('/product', [ProductController::class, 'store']);
Route::put('/product/{id}', [ProductController::class, 'update']);

Route::group(['as' => 'cart.', 'prefix' => 'cart'], function () {
    Route::get('{id}/store', [CartController::class, 'store'])->name('store');
    Route::get('{id}/store', [CartController::class, 'store'])->name('store');
    Route::get('checkout', [CartController::class, 'index']);
    Route::get('????', [CartController::class, 'reduce']);
    Route::get('????', [CartController::class, 'destroy']);

    });