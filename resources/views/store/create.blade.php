@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')

        <div class="row">
            @include('shared.errors')
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
                                <input class="form-control" value="{{ old('name') }}" required="required" type="text" name="name" id="storeName"  placeholder="All Stores need a name">
                                <span class="help-block">A required field</span>
                            </div>

                            <div class="form-group">
                                <label for="network">Network</label>
                                <select class="form-control" required="required" name="network_id" id="network">
                                    <option>Select Network</option>
                                    @foreach($networks as $network)
                                        <option {{ (old('network_id') == $network->id) ? 'selected="selected"' : null }} value="{{ $network->id }}">{{ $network->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">A required field</span>
                            </div>

                            <div class="form-group">
                                <label for="brandManager">Brand Manager</label>
                                <select class="form-control" required="required" name="manager_id" id="brandManager">
                                    <option>Select Brand Manager</option>
                                    @foreach($users as $user)
                                        <option {{ (old('manager_id') == $user->id) ? 'selected="selected"' : null }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">A required field</span>
                            </div>

                            <div class="form-group">
                                <label for="url">Generic Store Homepage Link</label>
                                <input class="form-control" value="{{ old('url') }}" type="url" name="url" id="url"  placeholder="This will should go somewhere cool">
                            </div>

                            <div class="form-group">
                                <label for="imageUrl">Image URL</label>
                                <input class="form-control" value="{{ old('image_url') }}" required="required" type="url" name="image_url" id="imageUrl"  placeholder="This will make a great image one day">
                                <span class="help-block">A required field</span>
                            </div>

                            <div class="form-group">
                                <label for="storeTitle">Title</label>
                                <input class="form-control" type="text" name="title" id="storeTitle"  placeholder="The Store title">
                                <span class="help-block">This will be the Title of the Store's own page not required but it could be useful</span>
                            </div>

                            <div class="form-group">
                                <label for="storeBody">Store Description</label>
                                <textarea class="form-control" name="body" id="summernote"></textarea>
                                <span class="help-block">
                                    This should match up the Title you can created HTML here which you can tailor to your Store
                                    also not required but again could be useful
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="storeCategories" >Categories</label>
                                    <textarea
                                            name="categories"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Comma separated for more than one"
                                            id="storeCategories">{{ old('categories') }}</textarea>
                                <span class="help-block">This will fill as default for offers only on new or empty</span>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
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