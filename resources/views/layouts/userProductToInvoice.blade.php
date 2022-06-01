@extends("userPage")
@section('viewProduct')
<div class="view-page">
    <table class="table table-striped">
        <thead>
          <tr class="judul-kolom" style="text-align: center">
            <th scope="col">ID</th>
            <th scope="col">Category</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Picture</th>
         
          </tr>
        </thead> 
        <tbody>
        @if ($products->isEmpty())
          <h1>Barang sudah habis, silahkan tunggu hingga barang di-restock ulang</h1>
        @else
        @foreach ($products as $product)
        <tr class="isi-data">
          <th scope="row"><div class="data">{{ $product->product_id }}</div></th>
          <td><div class="data">{{ $product->category }}</div></td>
          <td><div class="data">{{ $product->name }}</div></td>
          <td><div class="data">{{ $product->price }}</div></td>
          <td><div class="data">{{ $product->qty}}</div></td>
          <td>
            <div class="data">
              @if ($product->picture == "No Picture")
                <p>No Picture</p>
              @else
                <img src="{{ asset('storage/productImages/' . $product->picture) }}" style="width: 100px; height:100px" >
              @endif
            </div>
          </td>
          <td class="data">
            <a class="btn btn-primary btn-lg active" href="{{ route('ProductToInvoiceForm',[$invoices->invoice_products_id,$product->product_id]) }}">ADD PRODUCT TO INVOICE</a>
          </td>
        </tr>

       @endforeach
        @endif
        

      </tbody>
      </table>
</div>
@endsection