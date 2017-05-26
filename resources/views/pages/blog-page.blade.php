@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $blog->title }}
                        </h3>
                    </div>

                    <div class="panel-body">
                        {!! $blog->body !!}
                    </div>

                    <div class="panel-footer">
                        <strong>Posted by:</strong> {{ $blog->user->name }}
                        <strong>Posted:</strong> {{ $blog->updated_at->diffForHumans()}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection