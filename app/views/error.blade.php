<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
{{ HTML::style('f/default.css') }}
<body class="site" id="fp">
@yield('content')
<p><a href="{{ URL::route('home') }}">Главная страница</a></p>
</body>
</html>