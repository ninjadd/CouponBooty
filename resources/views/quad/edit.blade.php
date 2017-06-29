@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12">

                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Update SOP: {{ $quad->title }}
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/quad/{{ $quad->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="titleInput">SOP Title</label>
                                <input class="form-control" type="text" name="title" value="{{ $quad->title }}" required="required" id="titleInput" placeholder="This should not be the title of a BP">
                                <span class="help-block">This is a required field so yeah</span>
                            </div>

                            <div class="form-group">
                                <label for="bodyTextarea">SOP Body</label>
                                <textarea id="summernote" class="form-control" rows="10" name="body" required="required" id="bodyTextarea">{!! $quad->body !!}</textarea>
                                <span class="help-block">Also required I mean it would be a sucky SOP with no content</span>
                            </div>

                            <button type="submit" class="btn btn-info">Update</button>
                        </form>

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