<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InvoiceController;
use GuzzleHttp\Middleware;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
})->name('/');
Route::group(['middleware'=>(['adminOnly','auth'])],function(){
    Route::get('/admin/home/', [AdminController::class,"adminHome"])->name("adminHome");
    Route::get('/admin/create/', [AdminController::class,"adminCreate"])->name("adminCreate");
    Route::get('/admin/view/', [AdminController::class,"adminView"])->name("adminView");
    Route::get('/admin/update/{id}',[AdminController::class,"adminUpdatePage"])->name('adminUpdatePage');
    Route::post('/product/add',[ProductController::class,"create"])->name('create');
    Route::delete('/product/delete/{id}',[ProductController::class,"destroy"])->name("delete");
    Route::patch('/adminUpdate/{id}',[ProductController::class,"update"])->name('update');
});

Route::group(['middleware'=>(['userOnly','auth'])],function(){
    Route::get('user/home/',[UserController::class,"userHome"])->name("userHome");
    Route::get('user/viewProduct/',[UserController::class,"userViewProduct"])->name("userViewProduct");
    Route::get('user/Invoice/',[UserController::class,"userInvoice"])->name("userInvoice");
    Route::get('user/Invoice/Form/{id}',[InvoiceController::class,"invoiceForm"])->name('InvoiceForm');
    Route::post('user/Invoice/Form/add/{id}',[InvoiceController::class,"create"])->name('createInvoice');
    Route::delete('user/Invoice/delete/{id}',[InvoiceController::class,"destroy"])->name("deleteInvoice");
});
require __DIR__.'/auth.php';

