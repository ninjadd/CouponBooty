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
            @foreach($end_offers as $end_offer)
                <div class="col s12 m6 l4 xl3">
                    <div class="card medium hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ $end_offer->image_url }}">
                        </div>
                        <div class="card-content">
                            <h6 class="card-title activator grey-text text-darken-4">{{ $end_offer->title }}<i class="material-icons right">more_vert</i></h6>
                        </div>
                        <div class="card-action">
                            @if($end_offer->coupon)
                                <a class="waves-effect activator waves-light btn deep-purple">See Details</a>
                            @else
                                <a class="waves-effect waves-light btn deep-orange" href="{{ $end_offer->url }}" target="_blank">Get Deal</a>
                            @endif
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{ $end_offer->title }}<i class="material-icons right">close</i></span>
                            @if($end_offer->coupon)
                                <br>
                                COPY:
                                <br>
                                <h5 class="z-depth-1-half teal-text text-darken-3 bold center-align">{{ $end_offer->coupon }}</h5>
                                <br>
                                <a class="waves-effect waves-light deep-purple btn" href="{{ $end_offer->url }}" target="_blank">USE COUPON</a>
                                <p>{{ strip_tags($end_offer->body) }}</p>
                            @else
                                <br>
                                <a class="waves-effect waves-light btn deep-orange" href="{{ $end_offer->url }}" target="_blank">Get Deal</a>
                                <p>{{ strip_tags($end_offer->body) }}</p>
                            @endif
                            <a href="https://twitter.com/home?status={{ urlencode($end_offer->url) }}" target="_blank">
                                <i class="fa fa-twitter-square fa-2x blue-grey-text" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($end_offer->url) }}" target="_blank">
                                <i class="fa fa-facebook-square fa-2x blue-grey-text" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
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