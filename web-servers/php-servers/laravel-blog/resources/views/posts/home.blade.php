@extends('layouts.app')

@section('content')
<div class="container-fluid header">
    @include('widget.nav')
    <div class="container">
        <div class="desc row col-md-6 col-xs-12">
            <h1>posts</h1>
            <h2>Obie is a virtual assistant to help you make faster decisions, be more informed and get shit done without leaving</h2>
        </div>
        <div class="desc-img row col-md-6 col-xs-12">
            <img src="{{ asset('img/header.jpg') }}" width="100%" >
        </div>
    </div>
</div>

@endsection
