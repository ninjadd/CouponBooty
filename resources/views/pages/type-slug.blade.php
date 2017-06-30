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

    <div class="container">
        <div class="row">
            <blockquote>
                <h2>{{ $type->label }} Coupons &amp; Promo Codes</h2>
                <p class="lead">
                    Most Recent Deals
                </p>
            </blockquote>
        </div>

        <div class="row">
            @include('shared.offer-cards')
        </div>
    </div>

@endsection