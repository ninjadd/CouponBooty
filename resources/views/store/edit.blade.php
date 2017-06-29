@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create Store
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/store/{{ $store->id }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="storeName">Name</label>
                                <input class="form-control"
                                       value="{{ $store->name }}"
                                       required="required" type="text" name="name" id="storeName"  placeholder="All Stores need a name">
                                <span class="help-block">Give a store a name the only required field</span>
                            </div>

                            <div class="form-group">
                                <label for="storeTitle">Title</label>
                                <input class="form-control"
                                       value="{{ $store->title }}"
                                       type="text" name="title" id="storeTitle"  placeholder="The Store title">
                                <span class="help-block">This will be the Title of the Store's own page not required but it could be useful</span>
                            </div>

                            <div class="form-group">
                                <label for="storeBody">Body</label>
                                <textarea class="form-control" name="body" id="summernote">{!! $store->body !!}</textarea>
                                <span class="help-block">
                                    This should match up the Title you can created HTML here which you can tailor to your Store
                                    also not required but again could be useful
                                </span>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>

                        @include('shared.errors')

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