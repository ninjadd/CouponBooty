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
                <h3>Most Recent Deals</h3>
            </blockquote>
        </div>
        <div class="row">
            @foreach($offers as $offer)
                <div class="col s3">
                    <div class="card card-small hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ $offer->image_url }}">
                        </div>
                        <div class="card-content valign-wrapper">
                            <span class="card-title activator grey-text text-darken-4 truncate">{{ $offer->title }}</span>
                            <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                            <span class="card-title grey-text text-darken-4">{{ $offer->title }}</span>
                            @if($offer->coupon)
                                <a class="waves-effect waves-light btn" href="{{ $offer->url }}" target="_blank">USE COUPON</a>
                                <span class="z-depth-1-half ">COPY: {{ $offer->coupon }}</span>
                            @endif
                            <p>{{ strip_tags($offer->body) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $offers->links('shared.pager') }}
    </div>
@endsection