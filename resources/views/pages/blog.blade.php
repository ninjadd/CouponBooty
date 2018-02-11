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
            <div class="col s9">
            @foreach($blogs as $blog)
                <div class="col s12">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ $blog->image_url }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $blog->title }}<i class="material-icons right">more_vert</i></span>
                            <a class="waves-effect waves-light btn" href="/blog/{{ $blog->title_slug }}">View</a>
                            <a class="right" href="https://twitter.com/home?status={{ url()->current().'/'.$blog->title_slug }}" target="_blank">
                                <i class="fa fa-twitter-square fa-3x blue-grey-text" aria-hidden="true"></i>
                            </a>
                            <a class="right" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current().'/'.$blog->title_slug }}" target="_blank">
                                <i class="fa fa-facebook-square fa-3x blue-grey-text" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">{{ $blog->title }}<i class="material-icons right">close</i></span>
                            <p>{{ strip_tags(str_limit($blog->body, 240)) }} ...</p>
                            <a class="waves-effect waves-light btn" href="/blog/{{ $blog->title_slug }}">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="col s3 valign-wrapper">
                @include('shared.blog-sidebar')
            </div>
        </div>
    </div>

@endsection