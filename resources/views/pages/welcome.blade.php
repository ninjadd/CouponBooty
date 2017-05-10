@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>CouponBooty</h1>
            <p>This is an example to show the potential of how awesome coupons can be in your booty.</p>
        </div>
        <div class="row">
            @if(count($offers))
                @foreach($offers as $offer)
                    <div class="col-lg-4">
                        <h2>{{ $offer->title }}</h2>
                        <p>{!! $offer->body !!}</p>
                        <p><a class="btn btn-default" href="#" role="button">View Coupon &raquo;</a></p>
                    </div>
                    <br>
                @endforeach
            @endif
        </div><!--/row-->
        {{ $offers->links() }}
    </div>

@endsection