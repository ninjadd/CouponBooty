@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12">

                {{--<img class="thumbnail" src="{{ asset('storage/images/CouponBooty_Logo_Horizontal.png') }}">--}}

            <div class="row">
                @if(count($offers))

                    @foreach($offers as $offer)
                        @include('shared.view')
                        <div class="col-md-12" style="margin-bottom: -16px;">
                            <div class="panel panel-info">
                                <div class="panel-heading clearfix">
                                    <h4 class="pull-left panel-title">
                                        {{ $offer->title }}
                                    </h4>
                                    <a class="btn btn-default btn-xs pull-right" data-toggle="modal" title="View {{ $offer->title }}" data-target="#myModal{{ $offer->id }}">View Coupon</a>
                                </div>
                                <div class="panel-body">
                                    <p class="lead text-danger">{{ $offer->type->label }}</p>
                                    {!! $offer->body !!}
                                </div>
                                <div class="panel-footer">
                                    Uploaded at: {{ $offer->created_at->diffForHumans() }}
                                    Uploaded by: {{ $offer->user->name }}
                                    <br>
                                    <div>
                                        @if(count($offer->categories->count()) > 0)
                                            @foreach($offer->categories as $category)
                                                <span class="label label-warning">{{ $category->name }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div><!--/row-->
            {{ $offers->links() }}
        </div>
    </div>

@endsection