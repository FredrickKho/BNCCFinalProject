@extends('userPage')
@section('Invoice')
<div class="Invoice">
    @if ($invoices->isEmpty())
        <h1>You have no invoice</h1>
    @else
        
    @endif
    <a class="btn btn-primary btn-lg active" href="{{ route('userViewProduct') }}">Add Invoices</a>
    
</div>
@endsection