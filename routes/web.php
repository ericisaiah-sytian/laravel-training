<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Models\Brand;
use App\Models\Models\Product;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// Admin Routes Starts Here

Route::get('admin/users', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('admin/users/add-user', [UserController::class, 'addUser'])->middleware('auth');
Route::post('admin/users/add-user', [UserController::class, 'store'])->middleware('auth');
Route::delete('admin/users/delete-user/{user:id}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('admin/users/edit-user/{user:id}', [UserController::class, 'edit'])->middleware('auth');
Route::post('admin/users/edit-user/{user:id}', [UserController::class, 'update'])->middleware('auth');

Route::get('admin/categories', [CategoryController::class, 'dashboard'])->middleware('auth');
Route::get('admin/categories/add-category', [CategoryController::class, 'addCategory'])->middleware('auth');
Route::post('admin/categories/add-category', [CategoryController::class, 'store'])->middleware('auth');
Route::delete('admin/categories/delete-category/{category:id}', [CategoryController::class, 'destroy'])->middleware('auth');
Route::get('admin/categories/edit-category/{category:id}', [CategoryController::class, 'edit'])->middleware('auth');
Route::post('admin/categories/edit-category/{category:id}', [CategoryController::class, 'update'])->middleware('auth');

Route::get('admin/brands', [BrandController::class, 'dashboard'])->middleware('auth');
Route::get('admin/brands/add-brand', [BrandController::class, 'addBrand'])->middleware('auth');
Route::post('admin/brands/add-brand', [BrandController::class, 'store'])->middleware('auth');
Route::delete('admin/brands/delete-brand/{brand:id}', [BrandController::class, 'destroy'])->middleware('auth');
Route::get('admin/brands/edit-brand/{brand:id}', [BrandController::class, 'edit'])->middleware('auth');
Route::post('admin/brands/edit-brand/{brand:id}', [BrandController::class, 'update'])->middleware('auth');

Route::get('admin/products', [ProductController::class, 'dashboard'])->middleware('auth');
Route::get('admin/products/add-product', [ProductController::class, 'addProduct'])->middleware('auth');
Route::post('admin/products/add-product', [ProductController::class, 'store'])->middleware('auth');
Route::delete('admin/products/delete-product/{product:id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('admin/products/edit-product/{product:id}', [ProductController::class, 'edit'])->middleware('auth');
Route::post('admin/products/edit-product/{product:id}', [ProductController::class, 'update'])->middleware('auth');
