@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="list-group">
                @foreach($blogs as $blog)
                <a href="/blog/{{ $blog->title_slug }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            <span class="text-info">{{ $blog->title }}</span>
                        </h5>
                    </div>
                    <p class="mb-1">
                        {{ str_limit(strip_tags($blog->body), 200, ' ...') }}
                    </p>
                    <small class="text-muted">
                        Updated: {{ $blog->created_at->diffForHumans() }}
                        <br>
                        Posted by: {{ $blog->user->name }}
                    </small>
                </a>
                @endforeach
            </div>

            {{--<div class="list-group">--}}
                {{--@foreach($blogs as $blog)--}}
                    {{--<a href="/blog/{{ $blog->title_slug }}" class="list-group-item">--}}
                        {{--<h4 class="list-group-item-heading">--}}
                            {{--<span class="text-info">{{ $blog->title }}</span>--}}
                        {{--</h4>--}}
                        {{--<p class="list-group-item-text">--}}
                            {{--{{ str_limit(strip_tags($blog->body), 200, ' ...') }}--}}
                        {{--</p>--}}
                    {{--</a>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        </div>
    </div>

@endsection