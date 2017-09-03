<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="语文,英语,奥数,物理,化学,中小学文化辅导,绘画,书法">
    <meta name="description" content="艾尔琳·金榜教育--给孩子不一样的未来">

    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- Styles -->
    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    @yield('head')
    <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?dbbf474e4e7a6ed5d247060fd3041499";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
    </script>

</head>
<body>
    @yield('content')

    <!-- Scripts -->
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('foot')
</body>
</html>
