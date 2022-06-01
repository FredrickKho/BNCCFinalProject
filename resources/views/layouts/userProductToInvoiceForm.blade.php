@extends("userPage")
@section('ProductToInvoiceForm')
<form action="{{ route('addProductToInvoice',[$invoice->invoice_products_id,$product->product_id]) }}" class="create-form" method="POST" enctype="multipart/form-data" style="text-align: center">
    @csrf
    @method('POST')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        <label><h3>Invoice Number : {{ $invoice->invoiceNumber }}</h3></label>
    </div>
    <div class="form-group">
        <label><h3>Nama Produk : {{ $product->name }}</h3></label>
    </div>
    <div class="form-group">
        <label><h3>Kategori : {{ $product->category }}</h3></label>
    </div>
    <div class="form-group">
        <label>
            <h3>
                Kuantitas (Stock yang tersedia : {{ $product->qty }})
            </h3>
            <input type="number" name="quantity">
        </label>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top:20px; margin-bottom:20px">Add Product To invoice</button>
</form>
@endsection