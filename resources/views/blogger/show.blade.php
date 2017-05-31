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

                    @if(count($blog->comments->count()) > 0)
                        <ul class="list-group">
                            <li class="list-group-item active">
                                Comments
                                <span class="badge">
                                    {{ $blog->comments->count() }}

                                    <p class="text-muted">
                                        <em>Created:</em> {{ $blog_comment->created_at->toDayDateTimeString() }}
                                    </p>
                                </span>
                            </li>
                            @foreach($blog->comments as $blog_comment)
                                <li class="list-group-item">
                                    {{ $blog_comment->body }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

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