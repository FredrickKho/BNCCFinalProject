@extends('userPage')
@section('Invoice')
<div class="Invoice">
    @if ($invoices->isEmpty())
        <h1>You have no invoice</h1>
    @else
    <?php $totalPrice = 0 ?>
    <table class="table table-striped">
        <thead>
          <tr class="judul-kolom" style="text-align: center">
            <th scope="col">Category</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Alamat Pengiriman</th>
            <th scope="col">Kode Zip</th>
            <th scope="col">Kuantitas</th>
            <th scope="col">Total Price</th>
            {{-- <th scope="col"></th> --}}
          </tr>
        </thead> 
        <tbody>
        @foreach ($invoices as $invoice)
            <tr class="isi-data">
              <td><div class="data">{{ $invoice->category }}</div></td>
              <td><div class="data">{{ $invoice->name }}</div></td>
              <td><div class="data">{{ $invoice->price }}</div></td>
              <td><div class="data">{{ $invoice->address }}</div></td>
              <td><div class="data">{{ $invoice->zipcode }}</div></td>
              <td><div class="data">{{ $invoice->quantity }}</div></td>
              <td><div class="data">{{ $invoice->quantity * $invoice->price }}</div></td>
              <td>
                <form action="{{ route('deleteInvoice',$invoice->invoice_id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">DELETE INVOICE</button>
                </form>
              </td>
              <?php $totalPrice = $totalPrice + ($invoice->quantity * $invoice->price) ?>
            </tr>
        @endforeach
      </tbody>
      </table>
      <h1>TOTAL PRICE = {{ $totalPrice }}</h1>
    @endif
    <a class="btn btn-primary btn-lg active" href="{{ route('userViewProduct') }}">Add Invoices</a>
    
</div>
@endsection