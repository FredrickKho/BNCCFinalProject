@extends('userPage')
@section('Invoice')
<div class="Invoice">
    @if ($invoices->isEmpty())
      <div class="noInvoice">
        <h1>You have no invoice</h1>
        <h3>Click "Create Invoice" to get your first invoice</h3>
      </div>
    @else
    <table class="table table-striped">
        <thead>
          <tr class="judul-kolom" style="text-align: center">
            <th scope="col">Invoice Number</th>
            <th scope="col">Address</th>
            <th scope="col">Zipcode</th>
            {{-- <th scope="col"></th> --}}
          </tr>
        </thead> 
        <tbody>
        @foreach ($invoices as $invoice)
        <tr class="isi-data">
          <th scope="row"><div class="data">{{ $invoice->invoiceNumber }}</div></th>
          <td><div class="data">{{ $invoice->address }}</div></td>
          <td><div class="data">{{ $invoice->zipcode }}</div></td>
          <td style="width:250px"><a  href="{{ route('invoiceProduct',$invoice->invoice_products_id) }}" style="width:250px;" class="btn btn-success">Show all product in this invoice</a></td>
          <form action="{{ route('deleteInvoice',$invoice->invoice_products_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <td style="width:250px"><button style="width:125px;" class="btn btn-danger">Delete Invoice</button></td>
          </form>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    <div class="createInvoice">
      <a class="btn btn-primary btn-lg active" href="{{ route('InvoiceForm') }}">Create Invoice</a> 
    </div>
  </div>
@endsection