<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{!! $keywords !!}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootswatch.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

@yield('head')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(Auth::user())
                        <li><a href="/dashboard">Das board</a></li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            More <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/blog">Blog</a></li>
                            <li class="divider"></li>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/terms">Terms</a></li>
                            <li><a href="/privacy">Privacy Policy</a></li>
                        </ul>
                    </li>
                    {{--@include('shared.store-nav')--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <form class="navbar-form navbar-left" action="/results" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="search_text" required="required" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    <li>
                        <a class="fa fa-facebook" aria-hidden="true" href="https://www.facebook.com/CouponBooty/" target="_blank"></a>
                    </li>
                    <li>
                        <a class="fa fa-twitter" aria-hidden="true" href="https://twitter.com/couponbooty" target="_blank"></a>
                    </li>
                    <li>
                        <a class="fa fa-instagram" aria-hidden="true" href="https://www.instagram.com/Couponbooty/" target="_blank"></a>
                    </li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/dashboard">Das boart</a></li>
                                <li class="divider"></li>
                                <li><a href="/blogger">Blog Administration</a></li>
                                <li class="divider"></li>
                                <li><a href="/contact">Contact Administration</a></li>
                                <li class="divider"></li>
                                <li><a href="/quad">The Quad&trade;</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<hr>

<!-- Footer -->
<div class="container">
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p class="text-warning">
                {{ config('app.name') }}
                <span class="text-primary">&copy; {{ date('Y') }}</span>
            </p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>
</div>
</body>
</html>
