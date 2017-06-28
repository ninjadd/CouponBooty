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
            @foreach($offers as $offer)
                <div class="col s3">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="{{ $offer->image_url }}">
                            <span class="card-title grey-text text-lighten-3">{{ $offer->type->label }}</span>
                        </div>
                        <div class="card-content">
                            <span class="card-title truncate">{{ $offer->title }}</span>
                            <p class="truncate">{{ strip_tags($offer->body) }}</p>
                            @if($offer->coupon)
                                COUPON:
                                <span class="z-depth-1-half">{{ $offer->coupon }}</span>
                            @else
                                <br>
                            @endif
                        </div>
                        <div class="card-action">
                            <a class="" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $offers->links('shared.pager') }}
    </div>
@endsection