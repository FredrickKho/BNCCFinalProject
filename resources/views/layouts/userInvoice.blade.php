@extends('userPage')
@section('Invoice')
<div class="Invoice">
    @if ($invoices->isEmpty())
        <h1>You have no invoice</h1>
    @else
    <table class="table table-striped">
        <thead>
          <tr class="judul-kolom" style="text-align: center">
            <th scope="col">Category</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Alamat Pengiriman</th>
            <th scope="col">Kode Zip</th>
            <th scope="col">Kuantitas</th>

          </tr>
        </thead> 
        <tbody>
        @foreach ($invoices as $invoice)
            <tr class="isi-data">
              <td><div class="data"></div></td>
              <td><div class="data"></div></td>
              <td><div class="data"></div></td>
              <td><div class="data"></div></td>
              <td><div class="data"></div></td>
              <td><div class="data"></div></td>
            </tr>
        @endforeach
      </tbody>
      </table>
    @endif
    <a class="btn btn-primary btn-lg active" href="{{ route('userViewProduct') }}">Add Invoices</a>
    
</div>
@endsection