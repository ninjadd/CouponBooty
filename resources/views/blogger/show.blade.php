@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                            {{ $blog->title }}
                        </h3>
                        <a class="btn btn-default btn-sm pull-right" href="/blogger/{{ $blog->id }}/edit">Edit</a>
                    </div>

                    <div class="panel-body">

                        {!! $blog->body !!}

                    </div>

                    <div class="panel-footer">
                        <strong>Created by:</strong> {{ $blog->user->name }}
                        <strong>Created at:</strong> {{ $blog->created_at }}
                        <strong>Updated at:</strong> {{ $blog->updated_at }}
                        <strong>Archived:</strong> {{ ($blog->archive == 1) ? 'Yes' : 'No' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection