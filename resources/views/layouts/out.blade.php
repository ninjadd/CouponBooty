<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{!! $keywords !!}"/>
    <meta name="description" content="CouponBooty is dedicated to provide a positive user experience for online shoppers. We partner with brands to give users the best and most reliable coupons. Located in Southern California our team aims to take the complexity out of getting discounts for the products you want to buy."/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

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
    <style>
        nav.nav-center ul {
            text-align: center;
        }
        nav.nav-center ul li {
            display: inline;
            float: none;
        }
        nav.nav-center ul li a {
            display: inline-block;
        }
    </style>
</head>
<body>
<nav class="teal lighten-2">
    <div class="nav-wrapper">
        <ul id="dropdown1" class="dropdown-content">
            @include('shared.store-nav')
        </ul>
        <ul id="dropdown2" class="dropdown-content">
            @include('shared.type-nav')
        </ul>
        <ul id="dropdown3" class="dropdown-content">
            <li><a href="/blog">Blog</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/terms">Terms</a></li>
            <li><a href="/privacy">Privacy Policy</a></li>
        </ul>
        <a href="/" class="brand-logo"><img style="padding-top: 10px; padding-left: 5px;" height="50" src="{{ asset('images/CouponBooty_Logo_Background_3.png') }}" alt="CouponBooty"></a>
        <ul class="right hide-on-med-and-down">

            <li><a href="/">Home</a></li>
            <li><a href="/stores">Stores</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown3">More<i class="material-icons right">arrow_drop_down</i></a></li>
            <li>
                <a class="dropdown-button waves-effect waves-light btn" href="#!" data-activates="dropdown1">
                    Shop By Store<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
            <li>
                <a class="dropdown-button waves-effect waves-light btn" href="#!" data-activates="dropdown2">
                    Shop By Type<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
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
            <li><a href="/stores">Stores</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/terms">Terms</a></li>
            <li><a href="/privacy">Privacy Policy</a></li>
            <li class="divider"></li>
            <li><a href="!#">Stores</a></li>
            <li class="divider"></li>
            @include('shared.store-nav')
            <li class="divider"></li>
            <li><a href="!#">Types</a></li>
            <li class="divider"></li>
            @include('shared.type-nav')
        </ul>
    </div>
</nav>

{{--<nav class="nav-center">--}}
    {{--<div class="nav-wrapper container">--}}
        {{--<ul>--}}
            {{--<li><a href="/about">About</a></li>--}}
            {{--<li><a href="/contact">Contact</a></li>--}}
            {{--<li><a href="/help">Help</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</nav>--}}

<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="input-field col s12 l3">
                <form id="search_text" class="col s12" action="/results" method="POST">
                    {{ csrf_field() }}
                    <i class="material-icons prefix">search</i>
                    <input type="text" id="autocomplete" name="search_text" class="autocomplete">
                    <label for="autocomplete">Search</label>
                </form>
            </div>
        </div>
    </div>
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
<script src="{{ asset('js/out.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.button-collapse').sideNav({
                menuWidth: 300, // Default is 300
                edge: 'left', // Choose the horizontal origin
                closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                draggable: true // Choose whether you can drag to open on touch screens,
            }
        );

        $('input.autocomplete').autocomplete({
            data: {
                @foreach($autoFillKeywords as $autoFillKeyword)
                    {!!   '"'.$autoFillKeyword.'" : null,' !!}
                @endforeach
            },
            onAutocomplete: function(val) {
                $('#search_text').submit();
            },
            limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
        });
    });

</script>
@yield('foot')
<!-- Script end -->
</body>
</html>