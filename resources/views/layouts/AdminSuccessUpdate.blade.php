@extends('adminPage')
@section('SuccessUpdate')
<div class="message" style="height: 780px; text-align:center;display:flex;align-items:center;justify-content:center">
    <div style="position: absolute;top:200px">
        <img style="width: 500px;height:500px" src="{{ URL::asset('images/Good.jpg') }}" alt="">
        <div class="message-container" style="margin-top:20px" >
            <h2>You successfully Updated your product</h2>
            <a style="margin-top:20px" href="{{ route('adminView') }}" class="btn btn-primary active">View your product</a>
        </div>
    </div>
</div>
@endsection