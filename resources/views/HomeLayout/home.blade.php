<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>The Ramkrishna Palace</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    @if($globalLogo)
    <link rel="icon" href="{{ asset('logo/' . $globalLogo->favicon_icon) }}" class="logo-img" type="image/x-icon">
    @endif
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="icon"       href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"media="screen">
    <link href="{{asset ('/assets/css/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
    .footer {
        background-color: {{ $theme->base_color }};
        color: {{ $theme ->text_color }};
    }

    .footer a {
        color: {{ $theme ->text_color }};
    }

    .footer a:hover {
        color: {{ $theme ->base_color }};
        background-color: {{ $theme ->text_color }};
    }

    .team-btn {
        background-color: {{ $theme ->base_color }};
    color: {{ $theme ->text_color }};
    border: 2px solid transparent;
    padding: 10px 25px;
    border-radius: 30px; /* Rounded button */
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-block;
    text-decoration: none;;
    }

    .team-btn:hover {
        background-color: {{$theme ->text_color }};
    color: {{ $theme ->base_color }};
    border-color: {{ $theme ->base_color }};
    }
</style>
</head>

<body class="main-layout">
    @include('particles.header')
    @include('particles.loader')
    @yield('content')
    @include('particles.footer')
</body>
</html>