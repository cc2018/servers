@extends('layouts.app')

@section('head')
<title>{{ config('app.name', 'Laravel') }}</title>
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid header">
    @include('widget.nav')
    <div class="container">
        <div class="desc row col-md-6 col-xs-12">
            <h1>All of your team knowledge at your fingertips.</h1>
            <h2>Obie is a virtual assistant to help you make faster decisions, be more informed and get shit done without leaving</h2>
        </div>
        <div class="desc-img row col-md-6 col-xs-12">
            <img src="{{ asset('img/header.jpg') }}" width="100%" >
        </div>
    </div>
</div>
<div class="container features">
    <div class="question">
        <h2>为什么选择金榜教育？</h2>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-5 col-md-offset-1">
            <div class="text-div">
                <h2 class="header-text">专业一对一服务</h2>
                <p>Obie leverages machine learning technology to create a more relevant and personalized experience. The more you use Obie, the smarter he gets. Now you can have an expert that grows and scales with your internal knowledge.</p>
            </div>
        </div>
        <div class="col-xs-12 col-md-5">
            <img class="works-image" src="{{ asset('/img/2.jpg') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-1 hidden-xs hidden-sm">
            <img class="works-image" src="{{ asset('/img/1.jpg') }}">
        </div>
        <div class="col-xs-12 col-md-5">
            <div class="text-div">
                <h2 class="header-text">在快乐中学习</h2>
                <p>Simply ask Obie a question, and he'll instantly provide you with the answer. With Obie, all of your team members have access to an expert. Save time by avoiding repetitive questions, shoulder taps, and calls that halt your focus.</p>
            </div>
        </div>
        <div class="col-xs-12 visible-xs visible-sm">
            <img class="works-image" src="{{ asset('/img/1.jpg') }}">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-5 col-md-offset-1">
            <div class="text-div">
                <h2 class="header-text">培养孩子的兴趣</h2>
                <p>Simply ask Obie a question, and he'll instantly provide you with the answer. With Obie, all of your team members have access to an expert. Save time by avoiding repetitive questions, shoulder taps, and calls that halt your focus.</p>
            </div>
        </div>
        <div class="col-xs-12 col-md-5 ">
            <img class="works-image" src="{{ asset('/img/3.jpg') }}">
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid contact">
        <div class="container">
            <div class="row col-md-offset-1">
                <h2 class="contact-us">联系我们</h2>
                <div class="address col-xs-9 col-md-4">
                    <p>地址：邹区镇金洲花城商铺7-2号</p>
                    <p>报名热线/微信：18961227865</p>
                </div>
                <img class="code col-xs-3 col-md-2" src="{{ asset('/img/code.jpg') }}">
                <p class="copyright col-xs-12 col-md-12">Copyright ©2017 {{ config('app.name', 'Laravel') }}版权所有.</p>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <p class="copyright">Copyright ©2017 常州艾尔琳·金榜教育.</p>
    </div> -->
</footer>
@endsection
