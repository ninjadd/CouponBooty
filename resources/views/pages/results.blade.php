@extends('layouts.app')

@section('head')
    <style>
        .container { margin-top: 20px; }
        .mb20 { margin-bottom: 20px; }

        hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
        hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
        hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

        .search-result .thumbnail { border-radius: 0 !important; }
        .search-result:first-child { margin-top: 0 !important; }
        .search-result { margin-top: 20px; }
        .search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
        .search-result ul { padding-left: 0 !important; list-style: none;  }
        .search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
        .search-result ul li i { padding-right: 5px; }
        .search-result .col-md-7 { position: relative; }
        .search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
        .search-result h3 > a, .search-result i { color: #248dc1 !important; }
        .search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; }
        .search-result span.plus { position: absolute; right: 0; top: 126px; }
        .search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
        .search-result span.plus a:hover { background-color: #414141; }
        .search-result span.plus a i { color: #fff !important; }
    </style>
@endsection

@section('content')

    <div class="container">

        @if(count($offers) > 0)

        <hgroup class="mb20">
            <h1>Search Results</h1>
            <h2 class="lead"><strong class="text-danger">{{ $offers->count() }}</strong> results were found for the search for <strong class="text-danger">{{ $request->search_text }}</strong></h2>
        </hgroup>

        <section class="col-xs-12 col-sm-6 col-md-12">

            @foreach($offers as $offer)
                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <img src="http://placehold.it/100X100" alt="" class="img-responsive">
                        {{ $offer->user->name }}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="meta-search">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>{{ $offer->created_at->diffForHumans() }}</span></li>
                            <li><i class="glyphicon glyphicon-time"></i> <span>{{ $offer->created_at }}</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span class="badge">{{ $offer->categories->count() }}</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                        <h3><a href="#" title="">{{ $offer->title }}</a></h3>
                        <p>{!! $offer->body !!}</p>
                        <span class="plus"><a class="btn btn-primary" href="#" role="button">View Coupon &raquo;</a></span>
                    </div>
                    <span class="clearfix borda"></span>
                </article>
            @endforeach

        </section>

        @endif

    </div>

@endsection