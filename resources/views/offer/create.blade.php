@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>
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
                                <textarea class="form-control" rows="10" name="body" required="required" id="bodyTextarea"></textarea>
                            </div>

                            <div class="form-group">
                                @foreach($types as $type)
                                    <label class="radio-inline">
                                        <input type="radio" name="type_id" value="{{ $type->id }}">
                                        {{ $type->label }}
                                    </label>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </form>

                        @include('shared.errors')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
