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
                            <label for="networkStores">{{ $network->name }} Stores</label>
                            <select class="form-control" required="required" name="store_id" id="networkStores">
                                <option>Select Store</option>
                                @foreach($stores as $store)
                                    <option {{ (old('store_id') == $store->id) ? 'selected="selected"' : null }} value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">A required field</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Upload CSV</label>
                            <div class="input-group">
                                <input type="file" name="csv_file" class="form-control">
                            </div>
                            <span class="help-block">A required field</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection