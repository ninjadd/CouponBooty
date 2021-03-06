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
        <h4 class="teal-text text-darken-3">
            Stores
        </h4>

        <div class="col s12">
            <ul class="pagination">
                <li class="waves-effect hoverable">
                    <a href="#09">
                        #
                    </a>
                </li>
                @foreach($initials as $initial)
                    @if(!is_numeric($initial->initial))
                        <li class="waves-effect hoverable">
                            <a href="#{{ (is_numeric($initial->initial)) ? null : strtoupper($initial->initial) }}">
                                {{ (is_numeric($initial->initial)) ? null : strtoupper($initial->initial) }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>


        @if($stores->byNumeric()->count() > 0)
            <div class="row">
                <div class="divider"></div>
                <div id="09" class="section">
                    <h5>#</h5>
                    @foreach($stores->byNumeric()->archive(0)->get() as $store)
                        @if($store->offers->where('archive', 0)->count() > 0)
                            <div>
                                <span class="col s2 m3 l3"><a class="deep-purple-text" href="/view/{{ $store->slug }}">{{ $store->name }} ({{ $store->offers->where('archive', 0)->count() }})</a></span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        @foreach(range('A', 'Z') as $item)
            @if($stores->byAlpha($item)->count() > 0)
                <div class="row">
                    <div class="divider"></div>
                    <div id="{{ $item }}" class="section">
                        <h5>{{ $item }}</h5>
                        @foreach($stores->byAlpha($item)->archive(0)->get() as $store)
                            @if($store->offers->where('archive', 0)->count() > 0)
                                <p>
                                    <span class="col s6 m4 l3"><a class="deep-purple-text" href="/view/{{ $store->slug }}">{{ $store->name }} ({{ $store->offers->where('archive', 0)->count() }})</a></span>
                                </p>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        <div class="row">
            <div class="divider"></div>
        </div>

    </div>
@endsection