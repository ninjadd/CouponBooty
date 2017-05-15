
<!-- Header Start -->
<header>
    <div class="rs_topheader">
        <div class="container-fluid">
            <div class="row">
                <div class="rs_topheader_left">

                </div>
                <div class="rs_topheader_center">
                    <a href="index.html"><img src="images/small_logo.png" alt=""></a>
                </div>
                <div class="rs_topheader_right">
                    <div class="rs_user_pic">
                        <div>
                            <h6>CouponBooty</h6>
                            <h5>More Here</h5>
                        </div>
                        <i class="glyphicon glyphicon-option-vertical" aria-hidden="true"></i>
                    </div>
                    <div class="rs_user_profile">
                        <ul>
                            <li><a href="author_dashboard.html"><i class="fa fa-user"></i> profile</a></li>
                            <li><a href="author_dashboard.html"><i class="fa fa-download"></i> download</a></li>
                            <li><a href="author_dashboard.html"><i class="fa fa-cog"></i> setting</a></li>
                            <li><a href="author_dashboard.html"><i class="fa fa-usd"></i> earning</a></li>
                            <li><a href="author_dashboard.html"><i class="fa fa-upload"></i> upload</a></li>
                            <li><a href="author_dashboard.html"><i class="fa fa-envelope"></i> message</a></li>
                            <li><a href="author_dashboard.html"><i class="fa fa-briefcase"></i> withdrow</a></li>
                            <li><a href="author_dashboard.html"><i class="fa fa-futbol-o"></i> support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rs_transprantbg rs_toppadder30 rs_bottompadder30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_index2_sociallink rs_toppadder20 rs_bottompadder20">
                        <label>Follow Us:</label>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_index2_logo">
                        <a href="index2.html">LOGO NEEDED HERE</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_loginsection rs_toppadder20 rs_bottompadder20">
                        <span><a href="{{ route('login') }}" data-toggle="modal" data-target="#login_popup">Login</a> / </span>
                        <span><a href="{{ route('register') }}" data-toggle="modal" data-target="#signup_popup">Signup</a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rs_transprantbg rs_toppadder30 rs_bottompadder30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_index2_sociallink rs_toppadder20 rs_bottompadder20">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_index2_logo">
                        <a href="index2.html"><img src="" class="img-responsive" alt="LOGO GOES HERE"></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <div class="rs_loginsection rs_toppadder20 rs_bottompadder20">
                        @if (Auth::check())
                            <span><a href="{{ url('/dashboard') }}">Dashboard</a></span>
                        @else
                            <span><a href="{{ url('/login') }}">Login</a></span> /
                            <span><a href="{{ url('/register') }}">Register</a></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- Header End -->
