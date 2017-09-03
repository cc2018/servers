@extends('layouts.app')

@section('head')
<title>{{ config('app.name', 'Laravel') }}</title>
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid common-nav">
    @include('widget.nav')
</div>
<div class="docs-container container">
  <div class="row">
    <div class="col-md-3 hidden-sm hidden-xs sidebar widget-area" role="complementary">
      <div class="sidebar hidden-print" data-spy="affix" data-offset-top="100" data-offset-bottom="140" role="complementary">
          <h2>目录</h2>
          <ul id="navigation" class="nav sidenav">
          </ul>
      </div>
    </div>
    <div id="primary" class="col-md-9 content-area" role="main">
        <div class="docs-content">
            <h3>2017</h3>
            <ul>
                @foreach ($posts as $post)
                  <li class="post-item">
                      <span>{{ $post->date  }}</span> >>
                      <a href="{{ $post->url }}">{{ $post->title  }}</a>
                  </li>
                @endforeach
            </ul>
        </div>
    </div>
  </div>
</div>
<footer class="footer" role="contentinfo">
	<div class="container">
		<p class="copyright">Copyright ©2017 {{ config('app.name', 'Laravel') }}版权所有.</p>
	</div>
</footer>

@endsection

@section('foot')
<script src="{{ asset('js/common.js') }}" ></script>
@endsection
