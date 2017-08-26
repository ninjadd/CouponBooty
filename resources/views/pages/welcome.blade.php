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
        <h4 class="teal-text text-darken-3">
            Most Recent Deals
        </h4>


        <div class="row">
            @include('shared.offer-cards')
        </div>
        {{ $offers->links('shared.pager') }}
    </div>

    <!-- Page Layout here -->
    {{--<div class="">--}}
        {{--<div class="row">--}}
            {{--<div class="col s9">--}}
                {{--<ul class="collection with-header">--}}
                    {{--<li class="collection-header teal-text text-darken-3"><h4>Most Recent Deals</h4></li>--}}
                {{--</ul>--}}

                {{--@include('shared.offer-cards')--}}
                {{--{{ $offers->links('shared.pager') }}--}}
            {{--</div>--}}

            {{--<div class="col s3 hide-on-med-and-down">--}}
                {{--<ul class="collection with-header">--}}
                    {{--<li class="collection-header"><h4>Stores</h4></li>--}}
                {{--</ul>--}}
                {{--<div class="collection">--}}
                    {{--@foreach($stores as $store)--}}
                        {{--<a href="/view/{{ $store->slug }}" class="collection-item"><span class="badge teal white-text">{{ $store->offers->count() }}</span>{{ $store->name }}</a>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
@endsection