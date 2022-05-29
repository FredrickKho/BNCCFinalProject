<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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
        $invoices = DB::table('invoice_products')
        ->join('products','invoice_products.product_id','=','products.product_id')
        ->join('invoices','invoice_products.invoice_id','=','invoices.invoice_id')
        ->get();
        // $invoices = Invoice::join('products','products.product_id','invoices.product_id')
        //             ->get();
        return view('layouts.userInvoice',compact("invoices"));
    }
    
}
