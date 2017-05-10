<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/dashboard">CouponBooty</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {{--offers--}}
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Offers
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/offer">All Offers</a></li>
                        <li><a href="/offer/create">New Offer</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="/dashboard">
                                Un-Archived Offers
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard?archive=1">
                                Archived Offers
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            {{--types--}}
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Types
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/type">All Types</a></li>
                        <li><a href="/type/create">New Type</a></li>
                    </ul>
                </li>
            </ul>
            {{-- users --}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                        {{--Users--}}
                        {{--<span class="caret"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="/user">All Users</a></li>--}}
                        {{--<li><a href="/user/create">New User</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/offer/create">
                        New Offer
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="/type/create">
                        New Type
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>