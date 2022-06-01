@extends('userPage')
@section('updateInvoice')
<div class="create-section">
    <h1 class="create">Update Invoice</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('updateInvoice',$product->product_id) }}" class="create-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Kategori : {{ $product->category }}</label>
        </div>
        <div class="form-group">
            <label>Nama Barang : {{ $product->name }}</label>
        </div>
        <div class="form-group">
            <label>Kuantitas : (Stock tersedia sebanyak {{ $product->qty }})</label>
            <input type="text" name="quantity">
        </div>
        <div class="form-group">
            <label>Harga perbarang : Rp{{ $product->price }}</label>
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