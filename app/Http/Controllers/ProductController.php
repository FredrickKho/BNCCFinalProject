<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
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
   
    public function update($id,Request $request, Product $product)
    {
        $imageProduct = Product::findOrFail($id);
        
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
            Storage::delete('public/productImages/'.$imageProduct->picture);
            if($request->hasFile('picture')){
                $productname = $request->file('picture')->getClientOriginalName();
                $picture = $request->file('picture')->storeAs('public/productImages',$productname);
            }else{
                $productname = "No Picture";
            }

            Product::find($id)->update([
                'category'=>$request->category,
                'name'=>$request->name,
                'price'=>$request->price,
                'qty'=>$request->qty,
                'picture'=>$productname,
            ]);
        }
        return redirect()->route('adminView');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/productImages/'.$product->picture);
        Product::destroy($id);
        return redirect()->route('adminView');
    }
}
