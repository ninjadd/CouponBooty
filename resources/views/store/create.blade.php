@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create Store
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/store" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="storeName">Name</label>
                                <input class="form-control" required="required" type="text" name="name" id="storeName"  placeholder="All Stores need a name">
                                <span class="help-block">Give a store a name the only required field</span>
                            </div>

                            <div class="form-group">
                                <label for="storeTitle">Title</label>
                                <input class="form-control" type="text" name="title" id="storeTitle"  placeholder="The Store title">
                                <span class="help-block">This will be the Title of the Store's own page not required but it could be useful</span>
                            </div>

                            <div class="form-group">
                                <label for="storeBody">Body</label>
                                <textarea class="form-control" name="body" id="summernote"></textarea>
                                <span class="help-block">
                                    This should match up the Title you can created HTML here which you can tailor to your Store
                                    also not required but again could be useful
                                </span>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
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