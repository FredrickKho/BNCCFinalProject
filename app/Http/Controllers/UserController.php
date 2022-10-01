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
        ->where('invoiceproduct_id','=',$id)
        ->get();
        // ->join('invoices','invoices.invoiceproduct_id','=','invoices.invoice_products_id')
        // ->where('invoiceproduct_id','=',$id)
        // ->get();
        return view('layouts.userInvoiceProductList',compact('invoices','subinvoice'));
    }
    
}
