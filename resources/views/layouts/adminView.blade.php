@extends("adminPage")
@section('view')
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
            <th scope="col" style="width: 350px">Action</th>
          </tr>
        </thead> 
        <tbody>
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
              <td>
                <div class="button-place">
                  <a href="{{ route("adminUpdatePage",Crypt::encrypt($product->product_id)) }}"  class="btn btn-success" style=" padding:5px 30px; margin-right:10px">EDIT</a>
                  <form action="{{ route("delete",$product->product_id) }}" style="display:inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="padding:5px 30px; margin-left:10px">DELETE</button>
                  </form>
                </div>
              </td>
            </tr>
        @endforeach
      </tbody>
      </table>
</div>
@endsection