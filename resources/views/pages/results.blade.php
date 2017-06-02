@extends('layouts.app')

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

        @if(count($offers) > 0)

            <div class="col-md-12">
                <h1>Search Results</h1>
                <h2 class="lead">
                    <strong class="text-danger">
                        {{ $offers->count() }}
                    </strong>
                    results were found for the search for
                    <strong class="text-danger">
                        {{ $request->search_text }}
                    </strong>
                </h2>
                <hr>
            </div>

        <section class="col-xs-12 col-sm-6 col-md-12">

            @foreach($offers as $offer)
                @include('shared.view')
                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="list-unstyled">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>{{ $offer->created_at->diffForHumans() }}</span></li>
                            <li><i class="glyphicon glyphicon-time"></i> <span>{{ $offer->created_at }}</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span class="badge">{{ $offer->categories->count() }}</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-10 excerpet">
                        <h3 class="text-primary">{{ $offer->title }}</h3>
                        <p>{!! $offer->body !!}</p>
                        <a class="btn btn-primary btn-xs pull-right"
                           data-toggle="modal" title="View {{ $offer->title }}"
                           data-target="#myModal{{ $offer->id }}">View Coupon &raquo;</a>
                    </div>
                </article>
            @endforeach

        </section>

        @endif

    </div>

@endsection