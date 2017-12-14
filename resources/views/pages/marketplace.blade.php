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

    <div class="row">
        <div class="col s12 m12 l9 xl9">
            <ul class="collection with-header">
                <li class="collection-header"><h4>Marketplace Deals</h4></li>
            </ul>

            @foreach($bannerAds as $bannerAd)
                <div class="col s12 m6 l4 xl3">
                    <div class="card">
                        <div class="card-image">
                            {!! $bannerAd->body !!}
                        </div>
                       @if(!empty($bannerAd->title))
                            <div class="card-content">
                                <p>{{ $bannerAd->title }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col s3 hide-on-med-and-down">
            @include('shared.store-side')
        </div>
    </div>

@endsection