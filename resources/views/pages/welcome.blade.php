@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>CouponBooty</h1>
                <p>This is an example to show the potential of how awesome coupons can be in your booty.</p>
            </div>
            <div class="row">
                @if(count($offers))

                    @foreach($offers as $offer)
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">{{ $offer->title }}</h4>
                                </div>
                                <div class="panel-body" style="min-height: 100; max-height: 100;">
                                    {!! $offer->body !!}
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-primary" href="#" role="button">View Coupon ></a>
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