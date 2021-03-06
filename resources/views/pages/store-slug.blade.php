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
        @if(empty($store->title))
            <h4 class="teal-text text-darken-3">{{ $store->name }} Offers</h4>
        @else
            <h4 class="teal-text text-darken-3">{{ $store->title }}</h4>
        @endif


        @if(empty($store->body))
            <div class="row">
                <div class="col s12 m8 offset-m2 l6 offset-l3">
                    <div class="card-panel z-depth-4">
                        <div class="row valign-wrapper">
                            <div class="col s12">
                                <a href="{{ $store->url }}" target="_blank"><img src="{{ $store->image_url }}" alt="{{ $store->name }}" class="responsive-img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col s12 m8 offset-m2 l8 offset-l2">
                    <div class="card-panel z-depth-4">
                        <div class="row">
                            <div class="col s6">
                                <a href="{{ $store->url }}" target="_blank"><img src="{{ $store->image_url }}" alt="{{ $store->name }}" class="responsive-img"></a>
                            </div>
                            <div class="col s6">
                                {{ strip_tags($store->body) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="row">
            @foreach($offers as $offer)
                <div class="card small hoverable">
                    <div class="card-content">
                        <h6 class="card-title activator grey-text text-darken-4">{{ $offer->title }}<i class="material-icons right">more_vert</i></h6>
                        <p>{{ strip_tags($offer->body) }}</p>
                        @if($offer->end_date)
                            <p>Expires: {{ $offer->end_date->format('m/d/Y') }}</p>
                        @endif

                        <p>
                            <br>
                            <a href="https://twitter.com/home?status={{ urlencode($offer->url) }}" target="_blank">
                                <i class="fa fa-twitter-square fa-2x blue-grey-text" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($offer->url) }}" target="_blank">
                                <i class="fa fa-facebook-square fa-2x blue-grey-text" aria-hidden="true"></i>
                            </a>
                        </p>
                    </div>
                    <div class="card-action">
                        @if($offer->coupon)
                            <a class="waves-effect activator waves-light btn deep-purple">See Details</a>
                        @else
                            <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                        @endif
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">{{ $offer->title }}<i class="material-icons right">close</i></span>
                        @if($offer->coupon)
                            <br>
                            COPY:
                            <br>
                            <h5 class="z-depth-1-half teal-text text-darken-3 bold center-align">{{ $offer->coupon }}</h5>
                            <br>
                            <a class="waves-effect waves-light deep-purple btn" href="{{ $offer->url }}" target="_blank">USE COUPON</a>
                            <p>{{ strip_tags($offer->body) }}</p>
                        @else
                            <br>
                            <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                            <p>{{ strip_tags($offer->body) }}</p>
                        @endif
                        @if($offer->end_date)
                            <p>Ends: {{ $offer->end_date->format('m/d/Y') }}</p>
                        @endif

                        <a href="https://twitter.com/home?status={{ urlencode($offer->url) }}" target="_blank">
                            <i class="fa fa-twitter-square fa-2x blue-grey-text" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($offer->url) }}" target="_blank">
                            <i class="fa fa-facebook-square fa-2x blue-grey-text" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection