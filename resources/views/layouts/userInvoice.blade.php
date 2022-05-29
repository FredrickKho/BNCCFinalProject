@extends('userPage')
@section('Invoice')
<div class="view-page">
    @if ($invoices->isEmpty())
        <h1>No Invoices</h1>
    @else
        
    @endif
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
       
      </tbody>
      </table>
</div>
@endsection