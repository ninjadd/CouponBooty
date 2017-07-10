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
            <h3 class="teal-text text-darken-3">Expiring Soon</h3>
        </div>

        <div class="row">
            <div class="carousel carousel-slider center" data-indicators="true">
                <div class="carousel-fixed-item">
                    <a href="/expiring" class="btn waves-effect deep-orange white-text darken-text-2">View Expiring Offers</a>
                </div>
                @foreach($end_offers as $end_offer)
                    <div class="carousel-item teal darken-3 white-text" href="">
                        <h2>{{ $end_offer->title }}</h2>
                        <p class="white-text">
                            {{ strip_tags($end_offer->body) }}
                        </p>
                        <p class="white-text">
                            @if($end_offer->coupont)
                                Code: {{ $end_offer->coupon }}<br>
                            @endif
                            Expires: {{ $end_offer->end_date }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="divider"></div>

        <div class="row">
            <h3 class="teal-text text-darken-3">Most Recent Deals</h3>
        </div>

        <div class="divider"></div>

        <div class="row">
            @include('shared.offer-cards')
        </div>
        {{ $offers->links('shared.pager') }}
    </div>
@endsection

@section('foot')
    <script>
        $(document).ready(function() {
            $('.carousel.carousel-slider').carousel({
                fullWidth: true,
                duration: 100
            });
        });
    </script>
@endsection