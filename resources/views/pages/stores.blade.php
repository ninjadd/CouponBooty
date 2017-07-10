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
    <div class="container">
        <div class="row">
            <h3 class="teal-text text-darken-3">
                Stores
            </h3>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="pagination">
                    @foreach($initial_stores as $key => $value)
                        <li class="waves-effect hoverable"><a href="#{{ $key }}">{{ is_int($key) ? '#' : strtoupper($key) }}</a></li>
                    @endforeach
                </ul>
                <div>
                    <ul class="collection">
                        @foreach($initial_stores as $key => $value)
                        <li class="collection-item avatar">
                            <i class="material-icons circle">view_list</i>
                            <span class="title">{{ is_int($key) ? '#' : strtoupper($key) }}</span>
                            <ul id="{{ $key }}">
                                @for ($i = 0; $i < sizeof($value); $i++)
                                    <li><a href="/view/{{ $value[$i]['slug'] }}">{{ $value[$i]['name'] }}</a></li>
                                @endfor
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection