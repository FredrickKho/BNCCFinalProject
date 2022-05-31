<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\InvoiceProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function invoiceForm($id){
        $product = Product::findOrFail($id);
        return view("layouts.invoiceForm",compact('product'));
    }
    public function create(Request $request, $id)
    {   $product = Product::findOrFail($id);
        $validate = $request->validate([
            'quantity'=>['required','integer','min:0','max:'.$product->qty],
            'address' => ['required','min:10','max:100','string'],
            'zipcode' => ['required','integer','digits_between:5,5','numeric'],
        ],[
            'quantity.required' => 'Kuantitas must required',
            'quantity.integer' => 'Kuantitas must integer',
            'quantity.max' => 'Kuantitas must less than '.$product->qty,
            'address.required' => 'Alamat must required',
            'address.min' => 'Alamat must be 10-100 characters',
            'address.max' => 'Alamat must be 10-100 characters',
            'zipcode.required' => 'Kode Pos must be 10-100 characters',
            'zipcode.integer'=> 'zipcode must integer',
            'zipcode.digits_between' => 'zipcode must 5 digits',
        ]);
        if($validate){
            
            Invoice::create([
                'invoice_num'=> "INV-XXX",
                'product_id' => $product->product_id,
                'quantity'=>$request->quantity,
                'address'=>$request->address,
                'zipcode' => $request->zipcode,
            ]);
            $invoice = DB::table('invoices')->orderBy('invoice_id','desc')->first();
            InvoiceProduct::create([
                'invoice_id' => $invoice->invoice_id,
                'product_id' => $product->product_id,
            ]);
            return redirect()->route('userInvoice');
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
        //
    }

   
    public function destroy(Invoice $invoice)
    {
        
    }
}
