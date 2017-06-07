@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Update Type #{{ $type->id }}
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/type/{{ $type->id }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="lableInput">Type Label</label>
                                <input class="form-control" value="{{ $type->label }}" type="text" name="label" id="lableInput"  placeholder="A great label for one and all">
                            </div>

                            <button type="submit" class="btn btn-success pull-right">Update</button>
                        </form>

                        @include('shared.errors')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection