<nav class="navbar navbar-default">
    <div class="container-fluid">

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            {{--stores--}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
                        {{--Stores--}}
                        {{--<span class="caret"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="/store">All Stores</a></li>--}}
                        {{--<li><a href="/store/create">New Store</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
            {{--offers--}}
            <ul class="nav navbar-nav">
                <li><a href="/dashboard">DasBoard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Offers
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/offer">Live Offers</a></li>
                        <li><a href="/offer?filter=archived">Archived Offers</a></li>
                        <li><a href="/offer?filter=staged">Staged Offers</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/upload/1">CommissionJunction Upload</a></li>
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="/offer/csv">Offers Download</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="/offer">Offers Index</a></li>--}}
                    </ul>
                </li>
            </ul>
            {{--user filters--}}
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Filters
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="?filter_user=all">All</a></li>
                        <li><a href="?filter_user=3">Jessica Brown</a></li>
                        <li><a href="?filter_user=4">Larry Cunningham</a></li>
                        <li><a href="?filter_user=1">Daniel Dickson</a></li>
                        <li><a href="?filter_user=2">Chelsea Hoffman</a></li>
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

            <ul class="nav navbar-nav navbar-right">
                {{--<li>--}}
                    {{--<a href="/offer/create">--}}
                        {{--New Offer--}}
                        {{--<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li>
                    <a href="/store/create">
                        New Store
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