<!DOCTYPE html>
<!--
Template Name:Restored Multipurpose Responsive HTML Template
Version: 1.0
Author: DigiSamaritan
Website: digisamaritan.com
Purchase: http://themeforest.net/user/DigiSamaritan
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <!--srart theme style -->
    <link href="{{ asset('restored/css/main.css') }}" rel="stylesheet" type="text/css">
    <!-- end theme style -->

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
<header>
    <div class="rs_graybg rs_toppadder20 rs_bottompadder20">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                    <div class="rs_index3_logo">
                        <a href="#"><img src="{{ asset('images/logo.png') }}" class="img-responsive" alt="logo"></a>
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
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<div class="rs_index2_footer rs_toppadder90 rs_bottompadder100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="rs_index2_footerdiv">
                    <img src="images/logo2.png" class="img-responsive" alt="logo">
                </div>
                <div class="rs_index2_footerdiv">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Secured Payments</a></li>
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </div>
                <div class="rs_index2_footerdiv">
                    <div class="rs_footer_textdata">
                        <p><i class="fa fa-map-marker"></i> 13, Roil Colony, Vodagupalymi, Maholunga, CA</p>
                        <p><i class="fa fa-phone"></i> 022-2648-9347</p>
                        <p><a href="#"><i class="fa fa-envelope"></i> info@digitalheaps.com</a></p>
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
                    <p>&copy; <a href="#">Restored.</a> All rights reserved. Designed with Love by DigitalHeaps</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="rs_index2_footer_link">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
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