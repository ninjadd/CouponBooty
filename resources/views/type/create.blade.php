@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create Type
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/type" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="lableInput">Type Label</label>
                                <input class="form-control" type="text" name="label" id="lableInput"  placeholder="A great label for one and all">
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