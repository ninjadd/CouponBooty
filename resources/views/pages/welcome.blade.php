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
        {{--<div class="row">--}}
            {{--<h3 class="teal-text text-darken-3">Expiring Soon</h3>--}}
        {{--</div>--}}
        {{--<div class="carousel carousel-slider center" data-indicators="true">--}}
            {{--<div class="carousel-fixed-item center">--}}
                {{--<a class="btn waves-effect white grey-text darken-text-2">button</a>--}}
            {{--</div>--}}
            {{--<div class="carousel-item red white-text" href="#one!">--}}
                {{--<h2>First Panel</h2>--}}
                {{--<p class="white-text">This is your first panel</p>--}}
            {{--</div>--}}
            {{--<div class="carousel-item amber white-text" href="#two!">--}}
                {{--<h2>Second Panel</h2>--}}
                {{--<p class="white-text">This is your second panel</p>--}}
            {{--</div>--}}
            {{--<div class="carousel-item green white-text" href="#three!">--}}
                {{--<h2>Third Panel</h2>--}}
                {{--<p class="white-text">This is your third panel</p>--}}
            {{--</div>--}}
            {{--<div class="carousel-item blue white-text" href="#four!">--}}
                {{--<h2>Fourth Panel</h2>--}}
                {{--<p class="white-text">This is your fourth panel</p>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <h3 class="teal-text text-darken-3">Most Recent Deals</h3>
        </div>
        <div class="row">
            @include('shared.offer-cards')
        </div>
        {{ $offers->links('shared.pager') }}
    </div>
@endsection

@section('foot')
    <script>
        $(document).ready(function(){
            $('.carousel.carousel-slider').carousel({fullWidth: true});
        });
    </script>
@endsection