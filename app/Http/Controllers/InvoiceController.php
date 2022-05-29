<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    
    public function create(Request $request)
    {
        $validate = $request->validate([
            'category'=>['required','string'],
            'name' => ['required','min:5','max:80','string'],
            'price' => ['required','integer'],
            'qty' => ['required','integer'],
        ],[
            'category.required' => 'the category must required',
            'name.required' => 'the product name must required',
            'name.min' => 'the product name must be 5-80 characters',
            'name.max' => 'the product name must be 5-80 characters',
            'price.required' => 'the product price must required',
            'price.integer' => 'the product price must integer',
            'qty.required' => 'the product quantity must required',
            'qty.integer' => 'the product quantity must integer',
        ]);
        if($validate){
            
            if($request->hasFile('picture')){
                $productname = $request->file('picture')->getClientOriginalName();
                $picture = $request->file('picture')->storeAs('public/productImages',$productname);
            }else{
                $productname = "No Picture";
            }

        Product::create([
                'category'=>$request->category,
                'name'=>$request->name,
                'price'=>$request->price,
                'qty'=>$request->qty,
                'picture'=>$productname,
            ]);
        }
        return view('layouts.adminHome');
    }

    
    public function store(StoreInvoiceRequest $request)
    {
        
    }

    
    public function view(Invoice $invoice)
    {
        
    }

    public function edit(Invoice $invoice)
    {
        //
    }

    
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

   
    public function destroy(Invoice $invoice)
    {
        
    }
}
