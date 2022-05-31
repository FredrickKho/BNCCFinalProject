@extends('userPage')
@section('SuccessCreate')
    <div class="message" style="height: 780px; text-align:center;display:flex;align-items:center;justify-content:center">
        <div style="position: absolute;top:200px">
            <img style="width: 500px;height:500px" src="{{ URL::asset('images/Good.jpg') }}" alt="">
            <div class="message-container" style="margin-top:20px" >
                <h2>You successfully created your Invoice</h2>
                <a style="margin-top:20px" href="{{ route('userInvoice') }}" class="btn btn-primary active">View your Invoice</a>
            </div>
        </div>
    </div>
@endsection