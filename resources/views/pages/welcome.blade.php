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
        <br>

        <div class="slider z-depth-3">
            <ul class="slides">
                @foreach($stores as $store)
                    <li>
                        <a href="/view/{{ $store->slug }}" target="_blank"><img src="{{ $store->image_url }}"></a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="row">
            <h4 class="teal-text text-darken-3">Most Recent Deals</h4>
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
        $(document).ready(function(){
            $('.slider').slider({
                indicators: true,
                transition: 200,
                height: 500
            });
        });
    </script>
@endsection