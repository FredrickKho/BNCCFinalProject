@extends('userPage')
@section('invoiceForm')
@php $invoiceNumber = "INV".rand(1,9).rand(0,9).rand(0,9).rand(0,9) @endphp
<div class="create-section">
    <h1 class="create">Create Invoice</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('createInvoice',$invoiceNumber) }}" class="create-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <h2>Invoice Number : <p style="display:inline"value= "{{ $invoiceNumber }}" name="invoiceNumber">{{ $invoiceNumber }}</p></h2>
        </div>
        <div class="form-group">
            <label>Alamat Pengiriman : </label>
            <input type="text" name="address"  placeholder="Masukan Alamat Pengiriman">
        </div>
        <div class="form-group">
            <label>Kode Pos : </label>
            <input type="text" name="zipcode"  placeholder="Masukan Kode Pos">
          </div>
        <button type="submit" class="btn btn-primary">Create Invoice</button>
    </form>
</div>
@endsection