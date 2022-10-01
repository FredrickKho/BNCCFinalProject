@extends('userPage')
@section("invoiceProductList")
@php $totalPrice = 0 @endphp
<div class="content" style="height:700px">
    <div class="header-content" style="text-align: center">
        <h6>PT WEASELSTORE</h6>
        <h6>Invoice Number : {{ $invoices->invoiceNumber }}</h6>
        <h6>Address : {{ $invoices->address }}</h6>
        <h6>Zipcode : {{ $invoices->zipcode }}</h6>
    </div>
    <div class="productlist">
        <table class="table table-striped">
            <thead>
                <tr class="judul-kolom" style="text-align: center">
                  <th scope="col">Product Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Product each price</th> 
                  <th scope="col">Total Price</th> 
                </tr>
              </thead>
        <tbody>
    
            @if ($subinvoice->isEmpty())
            <tr class="isi-data">
                <th colspan="5" style="text-align: left" >
                    <div style="max-width: 25%; text-align:center">
                        <a href="{{ route('productToInvoice',$invoices->invoice_products_id) }}" class="btn btn-success">Add Product</a>
                    </div>
                </th>
            </tr>
            @else
                @foreach ($subinvoice as $product)
                    <tr class="isi-data">
                        <th scope="row"><div class="data">{{ $product->productname }}</div></th>
                        <td><div class="data">{{ $product->category }}</div></td>
                        <td><div class="data">{{ $product->quantity }}</div></td>
                        <td><div class="data">Rp{{ $product->price }}</div></td>
                        <td><div class="data">Rp{{ $product->price * $product->quantity }}</div></td>
                        @php $totalPrice = $totalPrice +  $product->price * $product->quantity @endphp
                    </tr>
                @endforeach
                <tr class="isi-data">
                    <th colspan="5" style="text-align: left" >
                        <div style="max-width: 25%; text-align:center">
                            <a href="{{ route('productToInvoice',$invoices->invoice_products_id) }}" class="btn btn-success">Add Product</a>
                        </div>
                    </th>
                </tr>
                <td colspan="5" style="text-align: right;"><h1>TOTAL PRICE = Rp{{ $totalPrice }}</h1></td>
            @endif
        </tbody>
    </table>
    </div>
</div>
@endsection