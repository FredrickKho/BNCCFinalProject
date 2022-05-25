@extends("adminPage")
@section("create")
<div class="create-section">
    <h1 class="create">Create Product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('create') }}" class="create-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="category" class="form-control" id="kategori" aria-describedby="emailHelp" placeholder="Masukan Kategori Barang">        
        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="name" class="form-control" id="nama" placeholder="Masukan Nama Barang (Minimal 5 - 80 huruf)">
        </div>
        <div class="form-group">
            <label>Harga Barang</label>
            <div class="harga-barang" style="display: flex">
                <p class="rupiah">Rp. </p>
                <input type="text" name="price" class="form-control" id="harga" placeholder="Masukan Harga barang">
            </div>
        </div>
        <div class="form-group">
            <label>Jumlah Barang</label>
            <input type="number" name="qty" class="form-control" id="qty" aria-describedby="emailHelp" placeholder="Masukan Jumlah barang">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Foto Barang</label>
            <br>
            <input type="file" name="picture" class="form-control-file" id="foto">
          </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
    
@endsection