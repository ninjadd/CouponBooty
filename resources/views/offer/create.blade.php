@extends('layouts.app')

@section('head')
    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create Offer
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/offer" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="titleInput">Offer Title</label>
                                <input class="form-control" type="text" name="title" id="titleInput" required="required" placeholder="Make this title count">
                            </div>

                            <div class="form-group">
                                <label for="bodyTextarea">Offer Body</label>
                                <textarea id="summernote" class="form-control" rows="10" name="body" required="required" id="bodyTextarea"></textarea>
                            </div>

                            <div class="form-group">
                                @foreach($types as $type)
                                    <label class="radio-inline">
                                        <input type="radio" name="type_id" value="{{ $type->id }}">
                                        {{ $type->label }}
                                    </label>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="categoryTextarea">Offer Categories</label>
                                <textarea class="form-control" placeholder="Comma separated for more than one"
                                          name="categories" id="categoryTextarea"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </form>

                        @include('shared.errors')

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
