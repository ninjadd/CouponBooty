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

    <div class="row">
        <div class="col s12 m12 l9 xl9">
            <ul class="collection with-header">
                <li class="collection-header"><h4>Offers Expiring Soon</h4></li>
            </ul>

            @include('shared.offer-cards')
        </div>

        <div class="col s3 hide-on-med-and-down">
            @include('shared.store-side')
        </div>
    </div>

@endsection

