@extends('layouts.app')

@section('head')
<link href="{{ asset('css/post.css') }}" rel="stylesheet">
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
    <div class="col-md-9" role="main">
      <div class="panel docs-content">
        <div class="wrapper">
            <header class="post-header">
              <h1 class="post-title">{{ isset($post->title) ? $post->title : '' }}</h1>
              <div class="meta">Posted on <span class="postdate">{{ isset($post->date) ? $post->date : '' }}</span> By {{ isset($post->author) ? $post->author : '' }}</div>
              <br />
            </header>
            <article class="post-content" data-spy="scroll" data-target="#navigation">
              {!! $post->content !!}
            </article>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="footer" role="contentinfo">
	<div class="container">
		<p class="copyright">Copyright ©2017 金榜教育版权所有.</p>
	</div>
</footer>
@endsection

@section('foot')
<script src="{{ asset('js/common.js') }}" ></script>
@endsection
