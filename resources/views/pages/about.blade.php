@extends('layouts.app')

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

@section('sub-nav')
    @include('shared.store-nav')
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        About Us {{ config('app.name') }}
                    </h3>
                </div>

                <div class="panel-body">
                    <p>
                        CouponBooty is dedicated to provide a positive user experience for online shoppers. We partner with brands to give users the best and most reliable coupons.
                    </p>


                    <p>
                        Located in Southern California our team aims to take the complexity out of getting discounts for the products you want to buy.
                    </p>
                </div>

                <div class="panel-footer">

                </div>

            </div>

        </div>
    </div>

@endsection