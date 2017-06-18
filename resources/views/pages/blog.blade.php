@extends('layouts.app')

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

@section('sub-nav')
    @include('shared.store-nav')
@endsection

@section('content')


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <a class="text-muted" href="/blog">{{ config('app.name') }}</a>
                    <small></small>
                </h1>

                <!-- Blog Posts -->
                @if(count($blogs) > 0)
                    @foreach($blogs as $blog)
                        <h2>
                            <a href="/blog/{{ $blog->title_slug }}">{{ $blog->title }}</a>
                        </h2>
                        {{--<p class="lead">--}}
                            {{--by {{ $blog->user->name }}--}}
                        {{--</p>--}}
                        <p><span class="glyphicon glyphicon-time"></span> Posted {{ $blog->created_at->diffForHumans() }}</p>
                        <hr>
                        {{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
                        {{--<hr>--}}
                        <p>
                            {{ strip_tags($blog->body) }}
                        </p>
                        <a class="btn btn-primary" href="/blog/{{ $blog->title_slug }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    @endforeach
                @endif


                <!-- Pager -->
                {{ $blogs->links('shared.simple-pager') }}

            </div>

            @include('shared.blog-sidebar')

        </div>
    </div>
@endsection