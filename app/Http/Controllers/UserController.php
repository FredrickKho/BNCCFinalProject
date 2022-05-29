<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

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
        $invoices = Invoice::all();
        return view('layouts.userInvoice',compact("invoices"));
    }
    
}
