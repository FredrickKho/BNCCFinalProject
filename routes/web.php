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
    Route::get('user/Invoice/Form/',[InvoiceController::class,"invoiceForm"])->name('InvoiceForm');
    Route::get('user/Invoice/{invoiceid}/addProduct/{productid}/',[InvoiceController::class,"ProductToInvoiceForm"])->name('ProductToInvoiceForm');
    Route::post('user/Invoice/Form/add/{invoiceNumber?}',[InvoiceController::class,"create"])->name('createInvoice');
    Route::post('user/Invoice/addProduct/{invoiceid}/{productid}',[InvoiceController::class,"addProductToInvoice"])->name('addProductToInvoice');
    Route::get('user/Invoice/{id}',[UserController::class,"invoiceProductList"])->name('invoiceProduct');
    Route::get('user/Invoice/{id}/addProduct',[UserController::class,"addProductToInvoice"])->name("productToInvoice");
    Route::delete('user/Invoice/delete/{id}',[InvoiceController::class,"destroy"])->name("deleteInvoice");

});

require __DIR__.'/auth.php';

