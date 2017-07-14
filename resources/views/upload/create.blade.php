@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('shared.errors')

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Upload {{ $network->name }} CSV
                    </h3>
                </div>

                <div class="panel-body">
                    <form action="/upload/{{ $network->id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Upload CSV</label>
                            <div class="input-group">
                                <input type="file" name="csv_file" class="form-control">
                                <span class="input-group-btn">
                                  <button class="btn btn-primary" type="submit">Upload</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection