@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create New SOP
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/quad" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="titleInput">SOP Title</label>
                                <input class="form-control" type="text" name="title" required="required" id="titleInput" placeholder="This should not be the title of a BP">
                                <span class="help-block">This is a required field so yeah</span>
                            </div>

                            <div class="form-group">
                                <label for="bodyTextarea">SOP Body</label>
                                <textarea id="summernote" class="form-control" rows="10" name="body" required="required" id="bodyTextarea"></textarea>
                                <span class="help-block">Also required I mean it would be a sucky SOP with no content</span>
                            </div>

                            <button type="submit" class="btn btn-info">Save</button>
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