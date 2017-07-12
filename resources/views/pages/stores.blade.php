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
                    @foreach($initials as $initial)
                        <li class="waves-effect hoverable"><a href="#{{ (is_numeric($initial->initial)) ? '09' : strtoupper($initial->initial) }}">{{ (is_numeric($initial->initial)) ? '#' : strtoupper($initial->initial) }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        @if($stores->byNumeric()->count() > 0)
            <div class="row">
                <div class="divider"></div>
                <div class="section">
                    <h5>#</h5>
                    @foreach($stores->byNumeric()->get() as $store)
                        <div class="col s3">
                            {{ $store->name }}
                        </div>
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
                        @foreach($stores->byAlpha($item)->get() as $store)
                            <p>
                                <span class="col s3"><a href="/view/{{ $store->slug }}">{{ $store->name }} ({{ $store->offers->count() }})</a></span>
                            </p>
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