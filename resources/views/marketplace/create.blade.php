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
                        Create Marketplace
                    </h3>
                </div>

                <div class="panel-body">
                    <form action="/marketplace" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="marketplaceName">Name</label>
                            <input class="form-control" value="{{ old('name') }}" required="required" type="text" name="name" id="marketplaceName"  placeholder="A Marketplace should have a great name">
                            <span class="help-block">A required field</span>
                        </div>

                        <div class="form-group">
                            <label for="MarketplaceTitle">Title</label>
                            <input class="form-control" type="text" name="title" id="MarketplaceTitle"  placeholder="The Marketplace title">
                            <span class="help-block">This will be the Title of the Marketplaces's own page not required but it could be useful</span>
                        </div>

                        <div class="form-group">
                            <label for="storeBody">Marketplace Description</label>
                            <textarea class="form-control" name="body" id="summernote"></textarea>
                            <span class="help-block">
                                    This should match up the Title you can created HTML here which you can tailor to your Marketplace
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