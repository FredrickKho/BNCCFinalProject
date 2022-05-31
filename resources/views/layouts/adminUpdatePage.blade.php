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
            <select name="category" class="form-control" id="category" style="text-align:center;margin-top:20px">
                <option value="" selected="selected">Pilih Kategori</option>
                <option value="Sayur-sayuran">Sayur-sayuran</option>
                <option value="Buah-buahan">Buah-buahan</option>
                <option value="Daging">Daging</option>
                <option value="Kecantikan">Kecantikan</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Permainan">Permainan</option>
                <option value="Makanan">Makanan</option>
                <option value="Pakaian">Pakaian</option>
                <option value="Dapur">Dapur</option>
                <option value="Garasi">Garasi</option>
                <option value="Funiture">Funiture</option>
                <option value="Alat Elektronik">Alat Elektronik</option>
                <option value="Other">Other</option>
            </select>        
        </div>
        <div class="form-group">
            <label>Nama Barang <i>(Produk sebelum update = {{ $product->name }})</i></label>
            <input type="text" name="name" class="form-control" id="nama" placeholder="Masukan Nama Barang (Minimal 5 - 80 huruf)">
        </div>
        <div class="form-group price">
            <label>Harga Barang <i>(Produk sebelum update = {{ $product->price }})</i></label>
            <div class="harga-barang">
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
        <button type="submit" class="btn btn-primary" style="margin-top:20px; margin-bottom:20px">Update</button>
    </form>
</div>
@endsection