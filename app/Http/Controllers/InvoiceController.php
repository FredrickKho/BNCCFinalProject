<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoiceForm($id){
        $product = Product::findOrFail($id);
        return view("layouts.invoiceForm",compact('product'));
    }
    public function create(Request $request, $id)
    {
        $validate = $request->validate([
            'qty'=>['required','integer'],
            'address' => ['required','min:10','max:100','string'],
            'zipcode' => ['required','integer','digits_between:5,5','numeric'],
        ],[
            'qty.required' => 'Kuantitas must required',
            'qty.integer' => 'Kuantitas must integer',
            'address.required' => 'Alamat must required',
            'address.min' => 'Alamat must be 10-100 characters',
            'address.max' => 'Alamat must be 10-100 characters',
            'zipcode.required' => 'Kode Pos must be 10-100 characters',
            'zipcode.integer'=> 'zipcode must integer',
            'zipcode.digits_between' => 'zipcode must 5 digits',
        ]);
        if($validate){
            $product = Product::findOrFail($id);
            Invoice::create([
                'invoice_num'=> "INV-XXX",
                'product_id' => $product->product_id,
                'qty'=>$request->qty,
                'address'=>$request->address,
                'zipcode' => $request->zipcode,
            ]);
        }
        return redirect()->route('userInvoice');
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
