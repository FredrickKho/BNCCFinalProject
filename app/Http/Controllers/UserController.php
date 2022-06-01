<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('userOnly');
    }
    function userHome(){
        $user = auth()->user();
        return view('layouts.userHome',compact("user"));
    }
    function userViewProduct(){
        $products = Product::all();
        return view('layouts.userView',compact("products"));
    }
    function userInvoice(){
        $invoices = InvoiceProduct::all();
        return view('layouts.userInvoice',compact("invoices"));
    }
    function addProductToInvoice($id){
        $invoices = InvoiceProduct::findOrFail($id);
        $products = Product::all();
        return view('layouts.userProductToInvoice',compact("invoices","products"));
    }
    function invoiceProductList($id){
        $invoices = InvoiceProduct::findOrFail($id);
        $subinvoice = DB::table('invoices')
        ->join('products','products.product_id','=','invoices.product_id')
        ->where('invoiceproduct_id','=',$id)
        ->get();
        return view('layouts.userInvoiceProductList',compact('invoices','subinvoice'));
    }
    
}
