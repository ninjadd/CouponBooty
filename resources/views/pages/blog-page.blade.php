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

            </div>

            @include('shared.blog-sidebar')

        </div>
        <!-- /.row -->

@endsection