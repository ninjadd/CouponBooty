@extends('layouts.out')

@section('head')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100379036-1', 'auto');
        ga('send', 'pageview');

    </script>
@endsection

@section('content')

    <div class="rs_graybg rs_toppadder100 rs_bottompadder70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rs_main_heading rs_darkgreen_heading rs_bottompadder60">
                        <h3>About US</h3>
                        <div><span><i class="fa fa-heart"></i></span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                    <div class="rs_about_testimonial_slider">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="rs_about_testimoni">
                                    <p>CouponBooty is dedicated to provide a positive user experience for online shoppers. We partner with brands to give users the best and most reliable coupons.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="rs_about_testimoni">
                                    <p>Located in Southern California our team aims to take the complexity out of getting discounts for the products you want to buy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection