<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    function adminHome(){
        return view("layouts.adminHome");
    }
    function adminCreate(){
        return view("layouts.adminCreate");
    }
    function adminView(){
        $products = Product::all();
        return view('layouts.adminView',compact('products'));
    }
    function adminUpdatePage($id, Request $request){
        $id = Crypt::decrypt($id);
        $product = Product::findOrFail($id);
        return view('layouts.adminUpdatePage',compact('product'));
    }
}
