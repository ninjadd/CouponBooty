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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            @include('shared.errors')

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $blog->title }}</h1>

                <!-- Author -->
                {{--<p class="lead">--}}
                    {{--by {{ $blog->user->name }}--}}
                {{--</p>--}}

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{ $blog->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                {{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}

                {{--<hr>--}}

                <!-- Post Content -->
                {!! $blog->body !!}
                <hr>

                <!-- Comments Form -->
                <div class="well">
                    <h5>Leave a Comment:</h5>
                    <form action="/blog/{{ $blog->id }}" method="POST" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" required="required" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @if(count($blog->comments) > 0)
                    @foreach($blog->comments as $blog_comment)

                        <div class="media">
                            <div class="media-body">
                                <p class="media-heading"><strong>Posted</strong>
                                    <small>{{ $blog_comment->created_at->toDayDateTimeString() }}</small>
                                </p>
                                <p class="well well-sm">
                                    {{ $blog_comment->body }}
                                </p>
                            </div>
                        </div>

                    @endforeach
                @endif

            </div>

            @include('shared.blog-sidebar')

        </div>
        <!-- /.row -->
    </div>
@endsection