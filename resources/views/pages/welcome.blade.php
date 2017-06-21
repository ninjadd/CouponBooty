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

    <div class="rs_graybg rs_toppadder100 rs_bottompadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rs_main_heading rs_pink_heading rs_bottompadder60">
                        <h3>Latest Deals</h3>
                        <div><span><i class="fa fa-heart"></i></span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rs_filte">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <ul class="rs_sorting">
                                    <li><a href="#" class="filter" data-filter="all">All </a></li>
                                    @foreach($types as $type)
                                        <li><a href="#" class="filter" data-filter=".{{ str_slug($type->label).$type->id }}">{{ $type->label }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="rs_sort"><i class="fa fa-sort"></i> By Store <i class="glyphicon glyphicon-option-vertical" aria-hidden="true"></i></div>
                                <div class="rs_product_sorting">
                                    <ul>
                                        <li><a href="#" class="filter" data-filter=".psd">PSD</a></li>
                                        <li><a href="">Trending</a></li>
                                        <li><a href="">Release Date</a></li>
                                        <li><a href="">Best Sellers</a></li>
                                        <li><a href="">Best Rated</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="rs_grid">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="woocommerce_wrapper">
                            <div class="row">
                                @foreach($offers as $offer)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 rs_toppadder30 mix {{ str_slug($offer->type->label).$offer->type->id }}" data-value="{{ $loop->iteration }}">
                                        <div class="rs_product_div">
                                            <div class="rs_featureddiv">{{ $offer->type->label }}</div>
                                            <div class="rs_product_img">
                                                <img width="253" height="172" src="{{ $offer->image_url }}" class="" alt="">
                                                <div class="rs_overlay">
                                                    <div class="rs_overlay_inner">
                                                        <ul>
                                                            <li><a class="fancybox animated slideInDown" data-fancybox-group="product" href="images/500X343.png" title="Use"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="{{ $offer->url }}" target="_blank" title="Get Deal" class="animated slideInDown" ><i class="fa fa-compass"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                {{--<div class="rs_product_price"><h2><small>$</small>24</h2></div>--}}
                                            </div>

                                            <div class="rs_product_detail">
                                                <h5>{{ str_limit($offer->title, 25, '...') }}</h5>
                                            </div>
                                            <div class="rs_product_div_footer">
                                                <div class="rs_author_div">
                                                    <div>
                                                        <p><a href="#" class="filter" data-filter=".{{ str_slug($offer->type->label).$offer->type->id }}">Type: {{ $offer->type->label }}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rs_btn_div rs_toppadder60">
                        <a href="#" class="rs_button rs_button_orange filter" data-filter="all">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rs_graybg rs_knowledgebase_page_shadow rs_toppadder100 rs_bottompadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rs_main_heading rs_green_heading rs_bottompadder60">
                        <h3>Featured Deals</h3>
                        <div><span><i class="fa fa-heart"></i></span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="rs_featured_deals_silder">
                    <div class="owl-carousel owl-theme">
                        @foreach($offers as $offer)
                            <div class="item">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="rs_index2_product_div">
                                        <div class="rs_index2_product_img">
                                            <div class="rs_index2_offer_div">{{ $offer->type->label  }}</div>
                                            <img width="360" height="216" src="{{ $offer->image_url }}" class="" alt="{{ $offer->title }}">
                                            <div class="rs_index2_product_price"><h2><small></small>Hot</h2></div>
                                        </div>
                                        <div class="rs_index2_product_detail">
                                            <h5>{{ $offer->title }}</h5>
                                            {{--<p>{{ strip_tags($offer->body) }}</p>--}}
                                        </div>
                                        {{--<div class="rs_index2_product_detail_footer">--}}
                                            {{--<div class="product_date">--}}
                                                {{--<span>Ending on: {{ $offer->end_date }}</span>--}}
                                                {{--<p></p>--}}
                                            {{--</div>--}}
                                            {{--<div class="product_share">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#"><i class="fa fa-heart"></i> <span>28</span></a></li>--}}
                                                    {{--<li><a href="#"><i class="fa fa-comment"></i> <span>4</span></a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="rs_index2_inner_product_div">
                                            <h5>{{ $offer->title }}</h5>
                                            {{--<div class="rs_inner_product_price"><h2><small>$</small>12</h2></div>--}}
                                            <div class="detail_btn">
                                                @if($offer->coupon)
                                                    <a class="rs_button rs_button_orange" href="{{ $offer->url }}" target="_blank">Use Coupon</a>
                                                @else
                                                    <a class="rs_button rs_button_orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                                                @endif
                                            </div>
                                            {!! $offer->body !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection