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

    <div class="rs_graybg rs_toppadder100 rs_bottompadder50">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)

                    @if($loop->iteration % 2 == 0)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs_bottompadder60">
                            <div class="rs_blog_wrapper">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="rs_blog_content_img">
                                            <img width="570" height="323" src="{{ $blog->image_url }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="rs_blog_content">
                                            <span>{{ $blog->created_at->toFormattedDateString() }}</span>
                                            <h4><a href="/blog/{{ $blog->title_slug }}">{{ $blog->title }}</a></h4>
                                            <p>{{ str_limit(strip_tags($blog->body), 256, '...') }}</p>
                                            <div class="rs_btn_div">
                                                <a href="/blog/{{ $blog->title_slug }}" class="rs_button rs_button_orange pull-right">read</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 rs_bottompadder60">
                            <div class="rs_blog_wrapper">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-push-6 col-md-push-6 col-sm-push-0 col-xs-push-0">
                                    <div class="row">
                                        <div class="rs_blog_content_img">
                                            <img width="570" height="323" src="{{ $blog->image_url }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-pull-6 col-md-pull-6 col-sm-pull-0 col-xs-pull-0">
                                    <div class="row">
                                        <div class="rs_blog_content">
                                            <span>{{ $blog->created_at->toFormattedDateString() }}</span>
                                            <h4><a href="/blog/{{ $blog->title_slug }}">{{ $blog->title }}</a></h4>
                                            <p>{{ str_limit(strip_tags($blog->body), 256, '...') }}</p>
                                            <div class="rs_btn_div">
                                                <a href="/blog/{{ $blog->title_slug }}" class="rs_button rs_button_orange pull-right">read</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                @endforeach
            </div>
        </div>
    </div>

@endsection