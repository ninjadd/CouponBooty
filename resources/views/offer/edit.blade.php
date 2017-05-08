@extends('layouts.app')

@section('head')
    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.session')

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3>
                            Edit Offer
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/offer/{{ $offer->id }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="titleInput">Offer Title</label>
                                <input value="{{ $offer->title }}" class="form-control" type="text" name="title" id="titleInput" required="required" placeholder="Make this title count">
                            </div>

                            <div class="form-group">
                                <label for="bodyTextarea">Offer Body</label>
                                <textarea id="summernote" class="form-control" rows="10" name="body" required="required" id="bodyTextarea">{{ $offer->body }}</textarea>
                            </div>

                            <div class="form-group">
                                @foreach($types as $type)
                                    <label class="radio-inline">
                                        @if($offer->type_id == $type->id)
                                            <input type="radio" name="type_id" value="{{ $type->id }}" checked="checked">
                                        @else
                                            <input type="radio" name="type_id" value="{{ $type->id }}">
                                        @endif

                                        {{ $type->label }}
                                    </label>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-success pull-right">Update</button>
                        </form>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <div class="pull-left">
                                    <form action="/category/{{ $category->id }}" method="POST">
                                        <button type="submit" class="btn btn-default btn-sm">
                                            {{ $category->name }} <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </button>
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @endforeach
                        @endif
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
