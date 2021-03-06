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

                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">{{ $blog->title }}</span>
                        </div>
                        <div class="card-image">
                            <img src="{{ $blog->image_url }}">
                        </div>
                        <div class="card-action">
                            <p>{!! $blog->body  !!}</p>
                            <ul>
                                <li>{{ $blog->created_at->toDayDateTimeString() }}</li>
                                <li>{{ $blog->comments->count() }} comments</li>
                                <li>By {{ config('app.name') }}</li>
                            </ul>
                            <a href="https://twitter.com/home?status={{ url()->current().'/'.$blog->title_slug }}" target="_blank">
                                <i class="fa fa-twitter-square fa-3x blue-grey-text" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current().'/'.$blog->title_slug }}" target="_blank">
                                <i class="fa fa-facebook-square fa-3x blue-grey-text" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <form class="col s12" action="/blog/{{ $blog->id }}" method="POST">
                        <div class="row">
                            <div class="input-field col s12">
                                {{ csrf_field() }}
                                <textarea id="textarea1" required="required" name="body" class="materialize-textarea"></textarea>
                                <label for="textarea1">Comment</label>
                                <button type="submit" class="waves-effect waves-light btn">Add Comment</button>
                            </div>
                        </div>
                    </form>
                </div>

                <ul class="collection">
                    @foreach($blog->comments as $comment)
                        <li class="collection-item avatar">
                            <i class="material-icons circle">chat_bubble_outline</i>
                            <span class="title">Posted: {{ $comment->created_at->toDayDateTimeString() }}</span>
                            <p>{{ $comment->body }}</p>
                            <span href="#!" class="secondary-content"><i class="material-icons">grade</i></span>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col s3 valign-wrapper">
                @include('shared.blog-sidebar')
            </div>
        </div>
    </div>

@endsection