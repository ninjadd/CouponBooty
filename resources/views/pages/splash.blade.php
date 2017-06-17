<!DOCTYPE html>
<!--
Template Name:Restored Multipurpose Responsive HTML Template
Version: 1.0
Author: DigiSamaritan
Website: digisamaritan.com
Purchase: http://themeforest.net/user/DigiSamaritan
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <!--srart theme style -->
    <link href="{{ asset('restored/css/main.css') }}" rel="stylesheet" type="text/css">
    <!-- end theme style -->

@yield('head')
</head>
<body>
<!--Loader Start -->
<div class="rs_preloaded">
    <div class="rs_preloader">
        <div class="lines">
        </div>
        <div class="loading-text">LOADING...</div>
    </div>
</div>
<!--Loader End -->
<header>
    <div class="rs_graybg rs_toppadder20 rs_bottompadder20">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                    <div class="rs_index3_logo">
                        <a href="#"><img src="{{ asset('images/logo.png') }}" class="img-responsive" alt="logo"></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#rs_index3_menu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-10 col-xs-12">
                    <div class="rs_index3_menu">
                        <div class="collapse navbar-collapse" id="rs_index3_menu">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    <div class="rs_index2_topheader rs_toppadder50 rs_bottompadder30">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                    <div class="row">
                        <div class="rs_index3_searchform">
                            <form>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <select name="timepass" class="rs-custom-select">
                                            <option value="">Browse Categories</option>
                                            @if($categories->count() > 0)
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-option-vertical"></span></div>
                                            <input type="text" class="form-control" value="" placeholder="Enter the keyword that you need">
                                            <button class="rs_index3_search_btn"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs_graybg rs_toppadder80 rs_bottompadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                    <div class="rs_index3_category_list">
                        <ul>
                            @if($types->count() > 0)
                                @foreach($types as $type)
                                    <li><a href="#">{{ $type->label }} ({{ $type->offer->count() }})</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">
                    <div class="rs_index3_recommended_offer">
                        <h4>Recommended Offers For You</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 rs_toppadder30">
                            <div class="rs_index3_product_slider">
                                <div class="owl-carousel owl-theme">

                                    @foreach($offers->slice(0, 4) as $offer)
                                        <div class="item">
                                            <div class="rs_index3_productdiv">
                                                <div class="rs_index3_product_img">
                                                    <img src="{{ $offer->image_url }}" class="img-responsive" alt="">
                                                    <div class="rs_product_price"><h2><small>{{ $offer->type->label }}</small></h2></div>
                                                </div>
                                                <div class="rs_index3_product_data">
                                                    <div class="rs_index3_productdata_left">
                                                        <h5><a href="#">{{ $offer->title }}</a></h5>
                                                        {!! $offer->body !!}
                                                        <span>Ending on: Oct 18, 2015</span>
                                                    </div>
                                                    @if(!empty($offer->coupon))
                                                        <div class="rs_index3_productdata_right">
                                                            <p>Use Coupon</p>
                                                            <a href="#" class="rs_button rs_button_orange">{{ $offer->coupon }}</a>
                                                        </div>
                                                    @else
                                                        <div class="rs_index3_productdata_right">
                                                            <a href="{{ $offer->url }}" target="_blank" class="rs_button rs_button_orange">Get Deal</a>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 rs_toppadder30">

                            @foreach($offers->slice(4, 2) as $offer)
                                <div class="rs_index3_productdiv rs_index3_productdiv_small">
                                    <div class="rs_index3_product_img">
                                        <img src="{{ $offer->image_url }}" class="img-responsive" alt="">
                                        <div class="rs_product_price"><h2><small>{{ $offer->type->label }}</small></h2></div>
                                    </div>
                                    <div class="rs_index3_product_data">
                                        <div class="rs_index3_productdata_left">
                                            <h5><a href="#">{{ $offer->title }}</a></h5>
                                            <span>Ending on: {{ $offer->end_date }}</span>
                                        </div>
                                        @if(!empty($offer->coupon))
                                            <div class="rs_index3_productdata_right">
                                                <p>Use Coupon</p>
                                                <a href="#" class="rs_button rs_button_orange">{{ $offer->coupon }}</a>
                                            </div>
                                        @else
                                            <div class="rs_index3_productdata_right">
                                                <a href="{{ $offer->url }}" target="_blank" class="rs_button rs_button_orange">Deal</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs_toppadder100">
                    <div class="rs_save_section">
                        <p><span>SAVE</span> upto <span>$80</span> on purchasing Premium bundles with this Coupon Code <a href="#" class="rs_btn1">Get Code</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rs_graybg rs_toppadder100 rs_bottompadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 rs_bottompadder20">
                    <div class="rs_hot_coupon_heading">
                        <h3>Hot Coupon Offers</h3>
                        <span><i class="fa fa-heart"></i></span>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="woocommerce_wrapper">
                        <div class="row">

                            @foreach($offers as $offer)

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs_toppadder30 rs_hot_coupon">
                                    <div class="rs_product_div">
                                        <div class="rs_featureddiv"><p>{{ $offer->type->label }}</p></div>
                                        <div class="rs_product_img">
                                            <img src="{{ $offer->image_url }}" class="img-responsive" alt="">
                                        </div>

                                        <div class="rs_product_detail">
                                            <h5><a href="product_single.html">{{ $offer->title }}</a></h5>
                                            {{ $offer->body }}
                                            <span><i class="fa fa-clock-o"></i> Ending on: {{ $offer->end_date }}</span>
                                        </div>
                                        <div class="rs_product_div_footer">
                                            @if(!empty($offer->coupon))
                                                <div class="rs_btn_div">
                                                    <p>Use Code</p>
                                                    <a href="#" class="rs_button rs_button_orange">{{ $offer->coupon }}</a>
                                                </div>
                                            @else
                                                <div class="rs_btn_div">
                                                    <a href="{{ $offer->url }}" target="_blank" class="rs_button rs_button_orange">Get Deal</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                        <div class="row">
                            {{ $offers->links('shared.simple-pager') }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="rs_sidebar_wrapper_third">
                        <aside class="widget widget_coupons">
                            <h4 class="widget-title">Ending Soon Coupons...</h4>
                            <div class="rs_product_div rs_product_category_div">
                                <div class="rs_featureddiv">40%off</div>
                                <div class="rs_product_img">
                                    <img src="http://placehold.it/263X194" class="img-responsive" alt="">
                                    <div class="rs_product_price"><h2><small>$</small>12</h2></div>
                                </div>
                                <div class="rs_product_detail">
                                    <h5><a href="product_single.html">Minimal PSD Template</a></h5>
                                    <span><a href="#" class="rs_btn1">Get Code</a></span>
                                </div>
                            </div>
                            <div class="rs_product_div rs_product_category_div">
                                <div class="rs_featureddiv">50%off</div>
                                <div class="rs_product_img">
                                    <img src="http://placehold.it/263X194" class="img-responsive" alt="">
                                    <div class="rs_product_price"><h2><small>$</small>10</h2></div>
                                </div>
                                <div class="rs_product_detail">
                                    <h5><a href="product_single.html">20 Poly Backgrounds (Seamless)</a></h5>
                                    <span><a href="#" class="rs_btn1">Get Code</a></span>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget widget_advertisement">
                            <h4 class="widget-title">Advertisement Here..</h4>
                            <img src="http://placehold.it/263X253" alt="" class="img-responsive">
                            <img src="http://placehold.it/263X253" alt="" class="img-responsive">
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs_testimonial_section rs_toppadder80 rs_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1">
                            <div class="row">
                                <div class="rs_subscribe_section_form">
                                    <div class="rs_signup_logo">
                                        <img src="images/cplogo.png" alt="">
                                    </div>
                                    <div class="rs_signup_info">
                                        <h4>Extra $50 offer <span>on Purchasing above</span> $300</h4>
                                        <p>This offer only available within this month end and applicable only for registered members. If you need this offer Please register Here,</p>
                                    </div>
                                    <div class="rs_signup_infobtn rs_toppadder10">
                                        <a href="#" class="rs_button rs_button_orange rs_center_btn pull-right">signup</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs_graybg rs_knowledgebase_page_shadow rs_toppadder100 rs_bottompadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs_bottompadder40">
                    <div class="rs_hot_coupon_heading">
                        <h3>Today’s Best Offers</h3>
                        <span><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="rs_featured_deals_silder rs_tod_bstoffer_slider rs_toppadder10">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="rs_index2_product_div">
                                    <div class="rs_index2_product_img">
                                        <div class="rs_index2_offer_div">Trend</div>
                                        <img  src="http://placehold.it/360X216" class="img-responsive" alt="">
                                        <div class="rs_index2_product_price"><h2><small>$</small>10</h2></div>
                                    </div>
                                    <div class="rs_index2_product_detail">
                                        <h5>16 Custom Fonts Bundle</h5>
                                        <p>Amazing custom fonts for BEST deal</p>
                                        <p> price ever ;) Enjoy.</p>
                                        <span><a href="#" class="rs_btn1">Get Code</a></span>
                                    </div>
                                    <div class="rs_index2_product_detail_footer">
                                        <div class="product_date">
                                            <span><i class="fa fa-clock-o"></i> Ending on: Oct 18, 2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="rs_index2_product_div">
                                    <div class="rs_index2_product_img">
                                        <div class="rs_index2_offer_div">Featured</div>
                                        <img  src="http://placehold.it/360X216" class="img-responsive" alt="">
                                        <div class="rs_index2_product_price"><h2><small>$</small>12</h2></div>
                                    </div>
                                    <div class="rs_index2_product_detail">
                                        <h5>Letter Mock-up</h5>
                                        <p>Cool vector lettering in geometric or </p>
                                        <p>futuristic style from Danilo Gusmão Silveira.</p>
                                        <span><a href="#" class="rs_btn1">Get Code</a></span>
                                    </div>
                                    <div class="rs_index2_product_detail_footer">
                                        <div class="product_date">
                                            <span><i class="fa fa-clock-o"></i> Ending on: Oct 18, 2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="rs_index2_product_div">
                                    <div class="rs_index2_product_img">
                                        <div class="rs_index2_offer_div">Popular</div>
                                        <img  src="http://placehold.it/360X216" class="img-responsive" alt="">
                                        <div class="rs_index2_product_price"><h2><small>$</small>29</h2></div>
                                    </div>
                                    <div class="rs_index2_product_detail">
                                        <h5>5in1 Mega Bundle</h5>
                                        <p>Don't miss 2 GREAT mega bundles!!!</p>
                                        <p> 36 creative & artistic items</p>
                                        <span><a href="#" class="rs_btn1">Get Code</a></span>
                                    </div>
                                    <div class="rs_index2_product_detail_footer">
                                        <div class="product_date">
                                            <span><i class="fa fa-clock-o"></i> Ending on: Oct 18, 2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="rs_index2_product_div">
                                    <div class="rs_index2_product_img">
                                        <div class="rs_index2_offer_div">trend</div>
                                        <img  src="http://placehold.it/360X216" class="img-responsive" alt="">
                                        <div class="rs_index2_product_price"><h2><small>$</small>12</h2></div>
                                    </div>
                                    <div class="rs_index2_product_detail">
                                        <h5>Macbook Mockup</h5>
                                        <p>High resolution MacBook mock up which </p>
                                        <p>includes 4 shots of a workspace.</p>
                                        <span><a href="#" class="rs_btn1">Get Code</a></span>
                                    </div>
                                    <div class="rs_index2_product_detail_footer">
                                        <div class="product_date">
                                            <span><i class="fa fa-clock-o"></i> Ending on: Oct 18, 2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="rs_index2_product_div">
                                    <div class="rs_index2_product_img">
                                        <div class="rs_index2_offer_div">Popular</div>
                                        <img  src="http://placehold.it/360X216" class="img-responsive" alt="">
                                        <div class="rs_index2_product_price"><h2><small>$</small>18</h2></div>
                                    </div>
                                    <div class="rs_index2_product_detail">
                                        <h5>Ecommerce Mobile App UI Kit</h5>
                                        <p>High resolution MacBook mock up which </p>
                                        <p>includes 4 shots of a workspace.</p>
                                        <span><a href="#" class="rs_btn1">Get Code</a></span>
                                    </div>
                                    <div class="rs_index2_product_detail_footer">
                                        <div class="product_date">
                                            <span><i class="fa fa-clock-o"></i> Ending on: Oct 18, 2015</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs_transprantbg rs_processbar_section rs_toppadder100 rs_bottompadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs_bottompadder60">
                    <div class="rs_hot_coupon_heading">
                        <h3>How to use Coupon Codes</h3>
                        <span><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rs_how_to_process_section">
                        <ul id="rs_progressbar">
                            <li class="active"><span>step 1</span> <div class="rs_checkbox"><input type="checkbox" value="1" id="check1" name="checkbox">
                                    <label for="check1"></label></div></li>
                            <li class=""><span> step 2 </span><div class="rs_checkbox"><input type="checkbox" value="1" id="check2" name="checkbox">
                                    <label for="check2"></label></div></li>
                            <li class=""><span> step 3</span> <div class="rs_checkbox"><input type="checkbox" value="1" id="check3" name="checkbox">
                                    <label for="check3"></label></div></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_how_to_code_section">
                        <span><a href="#" class="rs_btn1">Get Code</a></span>
                        <p>Copy this Code from the offer</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_how_to_code_section">
                        <form class="form">
                            <div class="form-group">
                                <div class="col-sm-10 col-xs-12 col-sm-offset-1 col-xs-offset-0">
                                    <div class="row">
                                        <input type="text" class="form-control" placeholder="Paste the code">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p>Paste the Code in Checkout Section</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_how_to_code_section">
                        <button><i class="fa fa-thumbs-up"></i></button>
                        <p>Save Your Money with us., Enjoy.!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs_graybg rs_addicode_section rs_toppadder100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-6 col-xs-push-0">
                    <div class="rs_addi_offer_section">
                        <div class="rs_addi_offer_section_heading">
                            <h4>Get Additional Offer</h4>
                        </div>
                        <div class="rs_addi_offer_section_info">
                            <h4>Get upto $25 offer*</h4>
                            <h4>on Purchasing through APP</h4>
                            <p>Use this Code</p>
                            <div class="rs_btn_div">
                                <a href="#" class="rs_button rs_button_gray">APP25</a>
                            </div>
                            <span>Get irresistable offers*</span>
                        </div>
                        <div class="rs_addi_offer_section_heading">
                            <h4>download here</h4>
                        </div>
                        <div class="rs_addi_offer_section_storeimg">
                            <a href="#"><img src="images/addioffer_App-Store.jpg" alt=""></a>
                            <a href="#"><img src="images/addioffer_Play-Store.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 col-xs-pull-0">
                    <div class="rs_addi_offer_section_img">
                        <img src="http://placehold.it/409X498" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs_testimonial_section rs_toppadder50 rs_bottompadder50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="rs_subscribe_section_heading">
                                <h4>Subscribe to our free update deals, announcements, freebies offer and More..!</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                            <div class="row">
                                <div class="rs_subscribe_section_form rs_toppadder30">
                                    <form class="form">
                                        <input class="form-control" type="text" placeholder="Enter your mail address to start receiving" />
                                        <a href="#" class="rs_button rs_button_orange pull-right rs_center_btn">Subscribe</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="rs_index2_footer rs_toppadder90 rs_bottompadder100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="rs_index2_footerdiv">
                    <img src="images/logo2.png" class="img-responsive" alt="logo">
                </div>
                <div class="rs_index2_footerdiv">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Secured Payments</a></li>
                        <li><a href="#">My Profile</a></li>
                    </ul>
                </div>
                <div class="rs_index2_footerdiv">
                    <div class="rs_footer_textdata">
                        <p><i class="fa fa-map-marker"></i> 13, Roil Colony, Vodagupalymi, Maholunga, CA</p>
                        <p><i class="fa fa-phone"></i> 022-2648-9347</p>
                        <p><a href="#"><i class="fa fa-envelope"></i> info@digitalheaps.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rs_index2_bootomfooter rs_toppadder30 rs_bottompadder30">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <div class="rs_index2_copyright">
                    <p>&copy; <a href="#">Restored.</a> All rights reserved. Designed with Love by DigitalHeaps</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right">
                <div class="rs_index2_footer_link">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Start -->
<script src="{{ asset('restored/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/rating/star-rating.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/countto/jquery.countTo.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/countto/jquery.appear.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/owl/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/jquery.themepunch.tools.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/jquery.themepunch.revolution.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.actions.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.layeranimation.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.navigation.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.parallax.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/revel/revolution.extension.slideanims.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/jquery.mixitup.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/fancybox/jquery.fancybox.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/bootstrap-slider/bootstrap-slider.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/offcanvasmenu/snap.svg-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/offcanvasmenu/classie.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/offcanvasmenu/main3.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/jquery-ui/jquery-ui.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/c3_chart/d3.v3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/plugins/c3_chart/c3.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/pgwslideshow.js') }}" type="text/javascript"></script>
<script src="{{ asset('restored/js/custom.js') }}" type="text/javascript"></script>
<!-- Script end -->
</body>
</html>