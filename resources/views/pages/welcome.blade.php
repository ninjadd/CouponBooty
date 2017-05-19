@extends('layouts.pages')

@section('content')
    @include('shared.menu')

    @include('shared.slider')

    @include('shared.search')
<!-- Start Filter Menu -->
<div class="rs_graybg rs_toppadder100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="rs_main_heading rs_pink_heading rs_bottompadder60">
                    <h3>CouponBooty Coupons</h3>
                    <div><span><i class="fa fa-heart"></i></span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rs_transprantbg nopade">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="rs_filte">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="rs_sort"><i class="fa fa-sort"></i> Sort by <i class="glyphicon glyphicon-option-vertical" aria-hidden="true"></i></div>
                            <div class="rs_product_sorting" style="display: none;">
                                <ul>
                                    <li><a href="">Price</a></li>
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
    </div>
</div>
<!-- End Filter Menu -->

<!-- Start Grid -->
<div class="rs_graybg rs_bottompadder80">
    <div class="container">
        <div class="row">
            <div id="rs_aws_ftrd_grid">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="topGrid" class="woocommerce_wrapper">
                        <div class="row">

                            @if(count($offers) > 0)
                                @foreach($offers as $offer)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 rs_toppadder30 mix mix-all psd" data-value="1">
                                        <div class="rs_product_div">
                                            <div class="rs_featureddiv">{{ $offer->type->label }}</div>
                                            <div class="rs_product_img">
                                                <img src="http://placehold.it/253X172" class="img-responsive" alt="">
                                                <div class="rs_overlay">
                                                    <div class="rs_overlay_inner">
                                                        <ul>
                                                            <li><a class="fancybox " data-fancybox-group="product" href="images/500X343.png" title="Workspace Elements Kit"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="#" class=""><i class="fa fa-download"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="rs_product_detail">
                                                <h5><a href="product_single.html">{{ $offer->title }}</a></h5>
                                            </div>
                                            <div class="rs_product_div_footer">
                                                <div class="rs_author_div">
                                                    <div>
                                                        <h4>Posted By</h4>
                                                        <p><a class="fancybox" href="images/500X343.png">{{ $offer->user->name }}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="rs_pagination_second rs_toppadder40 text-center">
                    {{ $offers->links('pages.links') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Grid -->

<!-- Start Quotes -->
<div class="rs_testimonial_section_black rs_toppadder80 rs_bottompadder80">
    <div class="rs_testimonial_section_black_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                {{--<div class="rs_quote"><img src="images/slider/quote.png" alt=""></div>--}}
                <div class="rs_testimonial_slider_content">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="rs_testimonialdata">
                                <p>Keep the noise low
                                    She doesn't wanna blow it
                                    Shaking head to toe
                                    while your left hand does "the show me around"
                                    Quickens your heartbeat
                                    It beats me straight into the ground</p>
                                {{--<img src="http://placehold.it/80X80" class="img-responsive" alt="">--}}
                                <h5>Brand New</h5>
                                <a href="#">Sic Transit Gloria...Glory Fades</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="rs_testimonialdata">
                                <p>Breathe in for luck,
                                    Breathe in so deep,
                                    This air is blessed,
                                    You share with me.
                                    This night is wild,
                                    So calm and dull,
                                    These hearts they race,
                                    From self control.
                                    Your legs are smooth,
                                    As they graze mine,
                                    We're doing fine,
                                    We're doing nothing at all.</p>
                                {{--<img src="http://placehold.it/80X80" class="img-responsive" alt="">--}}
                                <h5>Dashboard Confessional</h5>
                                <a href="#">Hands Down</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="rs_testimonialdata">
                                <p>You can't resist her
                                    She's in your bones
                                    She is your marrow
                                    And your ride home
                                    You can't avoid her
                                    She's in the air (in the air)
                                    In between molecules
                                    Of oxygen and carbon dioxide </p>
                                {{--<img src="http://placehold.it/80X80" class="img-responsive" alt="">--}}
                                <h5>Weezer</h5>
                                <a href="#">Only in Dreams</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Quotes -->

<!-- Start Footer -->
<div class="rs_index2_bootomfooter rs_toppadder30 rs_bottompadder30">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <div class="rs_index2_copyright">
                    <p>&copy; <a href="#">Copyright {{ date('Y') }}</a> CouponBooty</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="rs_index2_footer_link">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Footer -->

@endsection