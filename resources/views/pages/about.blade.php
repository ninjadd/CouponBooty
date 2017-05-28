@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        About Us {{ config('app.name') }}
                    </h3>
                </div>

                <div class="panel-body">
                    <p class="lead">
                        CouponBooty is dedicated to provide a positive user experience for online shoppers. We partner with brands to give users the best and most reliable coupons.
                    </p>


                    <p class="lead">
                        Our team aims to take the complexity out of getting discounts for the products you want to buy.
                    </p>
                </div>

                <div class="panel-footer">
                    Located in Southern California
                </div>

            </div>

        </div>
    </div>

@endsection