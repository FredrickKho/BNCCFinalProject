@extends('adminPage')
@section('UpdatePage')
    <div class="create-section">
    <h1 class="create">Update Product (Product ID = {{ $product->product_id }} )</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('update',$product->product_id) }}" class="create-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>Kategori <i>(Produk sebelum update = {{ $product->category }})</i></label>
            <input type="text" name="category" class="form-control" id="kategori" aria-describedby="emailHelp" placeholder="Masukan Kategori Barang">        
        </div>
        <div class="form-group">
            <label>Nama Barang <i>(Produk sebelum update = {{ $product->name }})</i></label>
            <input type="text" name="name" class="form-control" id="nama" placeholder="Masukan Nama Barang (Minimal 5 - 80 huruf)">
        </div>
        <div class="form-group">
            <label>Harga Barang <i>(Produk sebelum update = {{ $product->price }})</i></label>
            <div class="harga-barang" style="display: flex">
                <p class="rupiah">Rp. </p>
                <input type="text" name="price" class="form-control" id="harga" placeholder="Masukan Harga barang">
            </div>
        </div>
        <div class="form-group">
            <label>Jumlah Barang <i>(Produk sebelum update = {{ $product->qty}})</i></label>
            <input type="number" name="qty" class="form-control" id="qty" aria-describedby="emailHelp" placeholder="Masukan Jumlah barang">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Foto Barang</label>
            @if ($product->picture == "No Picture")
                <i>(Produk sebelum update = No Picture)</i>
            @else
                <i>(Produk sebelum update = <img src="{{ asset('storage/productImages/'.$product->picture) }}" alt=""> )</i>
            @endif
            <br>
            <input type="file" name="picture" class="form-control-file" id="foto">
          </div>
        <button type="submit" class="btn btn-primary" style="margin-top:20px">Update</button>
    </form>
</div>
@endsection