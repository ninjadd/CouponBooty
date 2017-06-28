<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{!! $keywords !!}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/out.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet" media="screen,projection">

@yield('head')

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<nav class="teal lighten-2">
    <div class="nav-wrapper">
        <ul id="dropdown1" class="dropdown-content">
            @include('shared.store-nav')
        </ul>
        {{--<a href="/" class="brand-logo"><img height="50" src="{{ asset('images/CouponBooty_Logo_Horizontal_2.png') }}"></a>--}}
        <a href="/" class="brand-logo"> CouponBooty</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <!-- Dropdown Trigger -->
            <li>
                <a class="dropdown-button waves-effect waves-light btn" href="#!" data-activates="dropdown1">Shop By Store<i class="material-icons right">arrow_drop_down</i></a>
            </li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/terms">Terms</a></li>
            <li><a href="/privacy">Privacy Policy</a></li>
            <li><a class="fa fa-facebook" aria-hidden="true" href="https://www.facebook.com/CouponBooty/" target="_blank"></a></li>
            <li><a class="fa fa-twitter" aria-hidden="true" href="https://twitter.com/couponbooty" target="_blank"></a></li>
            <li><a class="fa fa-instagram" aria-hidden="true" href="https://www.instagram.com/Couponbooty/" target="_blank"></a></li>
            @if(Auth::user())
                <li><a href="/dashboard">Dasboard</a></li>
            @endif
        </ul>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="/">Home</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/terms">Terms</a></li>
            <li><a href="/privacy">Privacy Policy</a></li>
            @include('shared.store-nav')
        </ul>
    </div>
</nav>
<div class="row">
    <form class="col s12" action="/results" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">search</i>
                <input id="icon_telephone" type="text" name="search_text" class="validate">
                <label for="icon_telephone">Search coupons, codes, deals etc.</label>
            </div>
        </div>
    </form>
</div>
@yield('content')

<footer class="page-footer teal lighten-2">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">
                    {{ config('app.name') }}
                </h5>
                <img width="75" src="{{ asset('images/CouponBooty_Logo_Round-01.png') }}" class="img-responsive" alt="logo">
                <p class="grey-text text-lighten-3"><i class="fa fa-map-marker"></i> San Diego, California</p>
                <p class="grey-text text-lighten-3"><a class="grey-text text-lighten-3" href="mailto:contact@couponbooty.com"><i class="fa fa-envelope"></i> contact@couponbooty.com</a></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <ul>
                    <li><a class="grey-text text-lighten-3" href="/about">About Us</a></li>
                    <li><a class="grey-text text-lighten-3" href="/terms">Terms</a></li>
                    <li><a class="grey-text text-lighten-3" href="/privacy">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            &copy; <a class="grey-text text-lighten-3" href="/">{{ config('app.name') }}</a> All rights reserved. {{ date('Y') }}
            <p class="right">
                <a class="grey-text text-lighten-3" href="https://www.facebook.com/CouponBooty" target="_blank"><i class="fa fa-facebook"></i></a>
                <a class="grey-text text-lighten-3" href="https://twitter.com/couponbooty" target="_blank"><i class="fa fa-twitter"></i></a>
                <a class="grey-text text-lighten-3" href="https://www.instagram.com/Couponbooty" target="_blank"><i class="fa fa-instagram"></i></a>
            </p>
        </div>
    </div>
</footer>

<!-- Script Start -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/materialize.js') }}"></script>
<script>
    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true // Choose whether you can drag to open on touch screens,
    }
  );

</script>
<!-- Script end -->
</body>
</html>