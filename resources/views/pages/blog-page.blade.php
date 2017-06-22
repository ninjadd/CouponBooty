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

    <div class="rs_graybg rs_toppadder100 rs_bottompadder100">
        <div class="container">
            @include('shared.errors')
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="rs_single_blog_section">
                        <div class="rs_single_blog_wrapper rs_bottompadder40">
                            <h4>{{ $blog->title }}</h4>
                            <ul>
                                <li>{{ $blog->created_at->toDayDateTimeString() }}</li>
                                <li>{{ $blog->comments->count() }} comments</li>
                                <li>By {{ $blog->user->name }}</li>
                            </ul>
                            <img src="{{ $blog->image_url }}" class="img-responsive">
                        </div>

                        <div class="rs_single_blog_content rs_bottompadder50">
                            {!! $blog->body !!}
                        </div>

                    </div>
                    <div class="rs_single_blog_comments rs_bottompadder30">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="rs_single_blog_comments_title">
                                    <h4>Comments ({{ $blog->comments->count() }})</h4>
                                </div>
                                <div class="rs_single_blog_comments_show">
                                    <ol class="comment">
                                        @foreach($blog->comments as $comment)
                                            <li>
                                                <div class="rs_commentdiv">
                                                    <div class="rs_comment_data">
                                                        <h5>Posted: {{ $comment->created_at->toDayDateTimeString() }}</h5>
                                                        <p>{{ $comment->body }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="rs_blog_comments_form">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="rs_comments_form_title">
                                            <h4>Write your comment</h4>
                                        </div>
                                        <form action="/blog/{{ $blog->id }}" method="POST" role="form">
                                            {{ csrf_field() }}
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <textarea name="body" required="required" class="form-control" rows="10" placeholder="Message*"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="rs_btn_div rs_toppadder30">
                                                    <button type="submit" class="rs_button rs_button_orange">send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @include('shared.blog-sidebar')
            </div>
        </div>
    </div>



@endsection