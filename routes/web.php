<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/admin/home/', [AdminController::class,"adminHome"])->middleware(['auth'])->name("adminHome");
Route::get('/admin/create/', [AdminController::class,"adminCreate"])->middleware(['auth'])->name("adminCreate");
Route::get('/admin/view/', [AdminController::class,"adminView"])->middleware(['auth'])->name("adminView");
Route::get('/admin/update/{id}',[AdminController::class,"adminUpdatePage"])->middleware(['auth'])->name('adminUpdatePage');
Route::post('/product/add',[ProductController::class,"create"])->middleware(['auth'])->name('create');
Route::delete('/product/delete/{id}',[ProductController::class,"destroy"])->middleware(['auth'])->name("delete");
Route::patch('/adminUpdate/{id}',[ProductController::class,"update"])->middleware(['auth'])->name('update');

Route::get('user/home/',[UserController::class,"userHome"])->middleware(['auth'])->name("userHome");

require __DIR__.'/auth.php';

