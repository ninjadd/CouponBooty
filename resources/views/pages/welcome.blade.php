@extends('layouts.app')

@section('content')

    <div class="container">
        {{--<div class="col-md-12">--}}
            {{--<img class="img-rounded img-thumbnail" src="{{ asset('storage/images/CouponBooty_Logo_Horizontal.png') }}">--}}
        {{--</div>--}}

        @if(count($offers) > 0)

            <div class="col-md-12">
                <h2>{{ config('app.name') }}</h2>
                <h3 class="lead">
                    Most Recent Offerings
                </h3>
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