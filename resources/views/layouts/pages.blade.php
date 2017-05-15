<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8">
    <title>CouponBooty.com</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <!--srart theme style -->
    <link href="{{ asset('restored/css/main.css') }}" rel="stylesheet" type="text/css">
    <!-- end theme style -->
    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="">
</head>
<body>
<!--Loader Start -->
<div class="rs_preloaded">
    <div class="rs_preloader">
        <div class="lines">
        </div>
        <div class="loading-text">LOADING...</div>
    </div>
</div>
<!--Loader End -->

@yield('content')

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