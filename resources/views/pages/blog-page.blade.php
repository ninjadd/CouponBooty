@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

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
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
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
                                <h4 class="media-heading">Comment Posted
                                    <small>{{ $blog_comment->created_at->toDayDateTimeString() }}</small>
                                </h4>
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