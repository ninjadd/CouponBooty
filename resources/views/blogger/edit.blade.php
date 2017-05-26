@extends('layouts.app')

@section('head')
    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Update Blog {{ $blog->title }}
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/blogger/{{ $blog->id }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="titleInput">Blog Title</label>
                                <input value="{{ $blog->title }}" class="form-control" type="text" name="title" required="required" id="titleInput" placeholder="Some great blog title">
                            </div>

                            <div class="form-group">
                                <label for="bodyTextarea">Blog Body</label>
                                <textarea id="summernote" class="form-control" rows="10" name="body" required="required" id="bodyTextarea">
                                    {!! $blog->body !!}
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-info pull-right">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height:300
            });
        });
    </script>
@endsection