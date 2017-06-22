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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('restored/css/main.css') }}" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

@yield('head')

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<!--Loader Start -->
{{--<div class="rs_preloaded">--}}
    {{--<div class="rs_preloader">--}}
        {{--<div class="lines">--}}
        {{--</div>--}}
        {{--<div class="loading-text">LOADING...</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!--Loader End -->
{{--nav start--}}
<header>
    <div class="rs_graybg rs_toppadder20 rs_bottompadder20">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                    <div class="rs_index3_logo">
                        <a href="/"><img src="{{ asset('images/CouponBooty Logo_Horizontal_2.png') }}" class="img-responsive" alt="logo"></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#rs_index3_menu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
                    <div class="rs_index3_menu">
                        <div class="collapse navbar-collapse" id="rs_index3_menu">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>
                                <li><a href="javascript:;">More</a>
                                    <ul class="sub-menu">
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/about">About Us</a></li>
                                        <li><a href="/terms">Terms</a></li>
                                        <li><a href="/privacy">Privacy Policy</a></li>
                                    </ul>
                                </li>
                                @include('shared.store-nav')
                                <li><a href="https://www.facebook.com/CouponBooty" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/couponbooty" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/Couponbooty" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                @if(Auth::user())
                                    <li><a href="/dashboard">Das board</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{--nav end--}}

{{--blue nav start--}}
<div class="rs_index2_topheader rs_toppadder50 rs_bottompadder30">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                <div class="row">
                    <div class="rs_index3_searchform">

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <select name="timepass" class="rs-custom-select">
                                        <option>Buy Some</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <select name="timepass" class="rs-custom-select">
                                        <option>Stuff</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-option-vertical"></span>
                                        </div>
                                        <form action="/results" method="POST">
                                            {{ csrf_field() }}
                                            <input type="text" class="form-control" name="search_text" placeholder="Enter the keyword that you need">
                                            <button type="submit" class="rs_index3_search_btn"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--blue nav end--}}

@yield('content')

<div class="rs_index2_footer rs_toppadder90 rs_bottompadder100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="rs_index2_footerdiv">
                    <img width="75" src="{{ asset('images/CouponBooty_Logo_Round-01.png') }}" class="img-responsive" alt="logo">
                </div>
                <div class="rs_index2_footerdiv">
                    <ul>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/terms">Terms</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="rs_index2_footerdiv">
                    <div class="rs_footer_textdata">
                        <p><i class="fa fa-map-marker"></i> San Diego, California</p>
                        <p><a href="mailto:contact@couponbooty.com"><i class="fa fa-envelope"></i> contact@couponbooty.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rs_index2_bootomfooter rs_toppadder30 rs_bottompadder30">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <div class="rs_index2_copyright">
                    <p>&copy; <a href="/">CouponBooty</a> All rights reserved. {{ date('Y') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="rs_index2_footer_link">
                    <ul>
                        <li><a href="https://www.facebook.com/CouponBooty" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/couponbooty" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/Couponbooty" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Start -->
<script src="{{ asset('restored/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/rating/star-rating.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/countto/jquery.countTo.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/countto/jquery.appear.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/owl/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/jquery.themepunch.tools.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/jquery.themepunch.revolution.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.actions.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.layeranimation.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.navigation.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.parallax.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.slideanims.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/jquery.mixitup.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/fancybox/jquery.fancybox.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/bootstrap-slider/bootstrap-slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/offcanvasmenu/snap.svg-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/offcanvasmenu/classie.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/offcanvasmenu/main3.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/jquery-ui/jquery-ui.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/c3_chart/d3.v3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/c3_chart/c3.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/pgwslideshow.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/custom.js') }}" type="text/javascript"></script>
<!-- Script end -->
</body>
</html>