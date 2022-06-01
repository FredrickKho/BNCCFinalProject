<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\InvoiceProduct;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function InvoiceForm(){
        return view('layouts.invoiceForm');
    }
    public function ProductToInvoiceForm($invoiceid,$productid){
        $product = Product::findOrFail($productid);
        $invoice = InvoiceProduct::findOrFail($invoiceid);
        return view("layouts.userProductToInvoiceForm",compact("product","invoice"));
    }
    public function create(Request $request, $invoiceNumber)
    {  
        $validate = $request->validate([
            'address' => ['required','min:10','max:100','string'],
            'zipcode' => ['required','integer','digits_between:5,5','numeric'],
        ],[
            'address.required' => 'Alamat must required',
            'address.min' => 'Alamat must be 10-100 characters',
            'address.max' => 'Alamat must be 10-100 characters',
            'zipcode.required' => 'Kode Pos must be 10-100 characters',
            'zipcode.integer'=> 'zipcode must integer',
            'zipcode.digits_between' => 'zipcode must 5 digits',
        ]);
        if($validate){
            
            InvoiceProduct::create([
                'invoiceNumber'=> $invoiceNumber,
                'address'=>$request->address,
                'zipcode' => $request->zipcode,
            ]);
            return view('layouts.UserSuccessCreateInvoice');
        }
    }

    public function addProductToInvoice(Request $request,$invoiceid,$productid){
        $product = Product::findOrFail($productid);
        $invoice = InvoiceProduct::findOrFail($invoiceid);
        $validate = $request->validate([
            'quantity' => ['required','numeric','min:1','max:'.$product->qty],
        ],[
            'quantity.required' => 'Quantity must required',
            'quantity.max' => 'Quantity must not more than'.$product->qty,
        ]);
        if($validate){
            Invoice::create([
                'product_id' => $product->product_id,
                'invoiceproduct_id' => $invoice->invoice_products_id,
                'quantity' => $request->quantity,
            ]);
            return redirect()->route('userHome');
        }
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
        
    }

   
    public function destroy($id)
    {
        
        Invoice::destroy($id);
        return redirect()->route('userInvoice');
    }
}
