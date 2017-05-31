@extends('layouts.app')

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

@endsection