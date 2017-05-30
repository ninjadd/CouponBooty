@extends('layouts.app')

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
                        <h3><a href="#" title="">{{ $offer->title }}</a></h3>
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