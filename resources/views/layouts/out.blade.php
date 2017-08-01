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
        .back_ground_top {
            background-image: url("{{ asset('images/CouponBooty_Background.png') }}");
            background-repeat: no-repeat;
            height: 100px;
            background-size: cover;
            margin-top: -15px;
        }
        .back_ground_bottom {
            background-image: url("{{ asset('images/CouponBooty_Background.png') }}");
            background-repeat: no-repeat;
            height: 350px;
            background-size: cover;
            margin-bottom: -15px;
        }
    </style>
</head>
<body>

<div class="back_ground_top">
    <div class="card transparent">
        <div class="container">
            <div class="col s3">
                <a href="/"><img style="height: 100px; padding-top: 10px;" src="{{ asset('images/CouponBooty_Logo.png') }}"></a>
            </div>
        </div>
    </div>
</div>

<nav class="nav-border">
    <div class="nav-wrapper teal lighten-2">
        <div class="container">
            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
            <div class="row">

                <div class="col s12 hide-on-med-and-down">
                    <ul id="dropdown2" class="dropdown-content">
                        @include('shared.type-nav')
                    </ul>
                    <ul class="hide-on-med-and-down">
                        <li>
                            <a style="width: 160px;" class="dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown2">
                                Shop By Type<i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                        <li><a style="width: 160px; text-align: center;" href="/stores">Stores</a></li>
                        <li><a style="width: 160px; text-align: center;" href="/expiring">Expiring Soon</a></li>
                        <li><a style="width: 160px; text-align: center;" href="/blog">Blog</a></li>
                        @if(Auth::user())
                            <li><a style="width: 160px; text-align: center;" href="/dashboard">Dasboard</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <ul class="side-nav" id="mobile-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/stores">Stores</a></li>
                <li><a href="/expiring">Expiring Soon</span></a></li>
                <li><a href="/blog">Blog</a></li>
                <li class="divider"></li>
                <li><a href="#">Types</a></li>
                <li class="divider"></li>
                @include('shared.type-nav')
                <li class="divider"></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/terms">Terms</a></li>
                <li><a href="/privacy">Privacy Policy</a></li>
            </ul>

        </div>
    </div>
</nav>

<br>
<div class="container">
    <div class="col s12">
        <form id="search_text"  action="/results" method="POST"  autocomplete="off">
            {{ csrf_field() }}
            <div class="input-field">
                <input class="search" id="search" type="search" name="search_text" required>
                <label for="search">Search Offers, Codes &amp; Deals</label>
            </div>
        </form>
    </div>
</div>
<br>

@yield('content')

<footer class="page-footer back_ground_bottom">
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
                    <li><a class="grey-text text-lighten-3" href="/blog">Blog</a></li>
                    <li><a class="grey-text text-lighten-3" href="/about">About Us</a></li>
                    <li><a class="grey-text text-lighten-3" href="/terms">Terms</a></li>
                    <li><a class="grey-text text-lighten-3" href="/privacy">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <p class="left grey-text text-lighten-3">&copy; <a class="grey-text text-lighten-3" href="/">{{ config('app.name') }}</a> All rights reserved. {{ date('Y') }}</p>
        <p class="right">
            <a class="grey-text text-lighten-3" href="https://www.facebook.com/CouponBooty" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="grey-text text-lighten-3" href="https://twitter.com/couponbooty" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="grey-text text-lighten-3" href="https://www.instagram.com/Couponbooty" target="_blank"><i class="fa fa-instagram"></i></a>
        </p>
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

        $('input.search').autocomplete({
            data: {
                @foreach($autoFillKeywords as $autoFillKeyword)
                    {!!   '"'.$autoFillKeyword.'" : null,' !!}
                @endforeach
            },
            onAutocomplete: function(val) {
                $('#search_text').submit();
            },
            limit: 3, // The max amount of results that can be shown at once. Default: Infinity.
        });
    });

</script>
@yield('foot')
<!-- Script end -->
</body>
</html>