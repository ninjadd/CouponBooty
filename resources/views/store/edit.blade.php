@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12">
                @include('shared.errors')
                @include('shared.session')
                @include('shared.navbar')
            </div>
            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Edit Store
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
                                <span class="help-block">A required field</span>
                            </div>

                            <div class="form-group">
                                <label for="network">Network</label>
                                <select class="form-control" required="required" name="network_id" id="network">
                                    <option>Select Network</option>
                                    @foreach($networks as $network)
                                        <option {{ ($store->network_id == $network->id) ? 'selected="selected"' : null }} value="{{ $network->id }}">{{ $network->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">A required field</span>
                            </div>

                            <div class="form-group">
                                <label for="brandManager">Brand Manager</label>
                                <select class="form-control" required="required" name="manager_id" id="brandManager">
                                    <option>Select Brand Manager</option>
                                    @foreach($users as $user)
                                        <option {{ ($store->manager_id == $user->id) ? 'selected="selected"' : null }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">A required field</span>
                            </div>

                            <div class="form-group">
                                <label for="imageUrl">Image URL</label>
                                <input class="form-control" value="{{ $store->image_url }}" required="required" type="url" name="image_url" id="imageUrl"  placeholder="This will make a great image one day">
                                <span class="help-block">A required field</span>
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
                            <div class="form-group">
                                <label for="storeCategories" >Categories</label>
                                <textarea
                                        name="categories"
                                        class="form-control"
                                        rows="3"
                                        placeholder="Comma separated for more than one"
                                        id="storeCategories">{{ $store->categories }}</textarea>
                                <span class="help-block">This will fill as default for offers only on new or empty</span>
                            </div>


                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="list-group">
                    <a href="#" class="list-group-item active" data-toggle="modal" data-target=".new-offer-form">
                        <h4 class="list-group-item-heading">Quick Offer</h4>
                        <p class="list-group-item-text">Click to add a new offer to {{ $store->name }}</p>
                    </a>
                    @foreach($store->offers as $offer)
                        <a href="/offer/{{ $offer->id }}/edit" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $offer->title }}</h4>
                            @if($offer->archive == 0)
                                <span class="label label-success">Live</span>
                            @endif
                            @if($offer->archive == 1)
                                <span class="label label-warning">Archived</span>
                            @endif
                            @if($offer->archive == 2)
                                <span class="label label-info">Staged</span>
                            @endif
                            <p class="list-group-item-text">
                                {{ strip_tags($offer->body) }}
                            </p>
                            <p class="list-group-item-text">
                                <strong>Quick edit this offer</strong>
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="modal fade new-offer-form" tabindex="-1" role="dialog" aria-labelledby="">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add Offer to {{ $store->name }}</h4>
                        </div>
                        <form action="/offer" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="offerTitle" class="control-label">Title</label>
                                    <input required="required"
                                           name="title"
                                           type="text"
                                           class="form-control counter"
                                           id="offerTitle"
                                           value="{{ old('title') }}"
                                           placeholder="All great offers start with great title">
                                </div>

                                <div class="form-group">
                                    <label for="offerUrl" class="control-label">Offer URL</label>
                                    <input required="required"
                                           name="url"
                                           type="url"
                                           class="form-control"
                                           id="offerUrl"
                                           value="{{ old('url') }}"
                                           placeholder="This is where the advertiser URL goes">
                                    <span class="help-block">This one is also required</span>
                                </div>

                                <div class="form-group">
                                    <label for="storeLable" class="control-label">Store</label>
                                    <input type="hidden" name="store_id" value="{{ $store->id }}">
                                    <br>
                                    {{ $store->name }}
                                </div>

                                <div class="form-group">
                                    <label for="offerBody" class="control-label">Offer Text</label>
                                    <textarea required="required"
                                              name="body"
                                              class="form-control"
                                              rows="3"
                                              id="summernote2">{{ old('body') }}</textarea>
                                    <span class="help-block">You guessed it, this one is required</span>
                                </div>

                                <div class="form-group">
                                    <label for="typeLabel" class="control-label">Type</label>
                                    <br>
                                    @foreach($types as $type)
                                        <label class="radio-inline">
                                            <input {{ (old('type_id') == $type->id) ? 'checked="checked"' : null }} type="radio" name="type_id" value="{{ $type->id }}">
                                            {{ $type->label }}
                                        </label>
                                    @endforeach
                                    <span class="help-block">Select one please these are required as well</span>
                                </div>

                                <div class="form-group">
                                    <label for="coupon" class="control-label">Coupon</label>
                                    <input
                                            name="coupon"
                                            type="text"
                                            class="form-control"
                                            id="coupon"
                                            value="{{ old('coupon') }}"
                                            placeholder="This is the Coupon or Code or whatever you want to call it">
                                    <span class="help-block">This is not required so you could call it optional if you like</span>
                                </div>

                                <div class="form-group">
                                    <label for="offerCategories" class="control-label">Categories</label>
                                    <textarea
                                            name="categories"
                                            class="form-control"
                                            rows="3"
                                            placeholder="Comma separated for more than one"
                                            id="offerCategories">{{ $store->categories }}</textarea>
                                    <span class="help-block">This will help with search and filtering later on</span>
                                </div>

                                <div class="form-group">
                                    <label for="startDate" class="control-label">Start Date</label>
                                    <input name="start_date"
                                           type="text"
                                           class="form-control"
                                           id="startDate"
                                           value="{{ old('start_date') }}"
                                           placeholder="MM/DD/YYYY">
                                    <span class="help-block">Not required. I think it will help us better manage our coupons so we only have active ones. We don’t want AdAssured coming after us.</span>
                                </div>

                                <div class="form-group">
                                    <label for="endDate" class="control-label">End Date</label>
                                    <input name="end_date"
                                           type="text"
                                           class="form-control"
                                           id="endDate"
                                           value="{{ old('end_date') }}"
                                           placeholder="MM/DD/YYYY">
                                    <span class="help-block">Not required. I think it will help us better manage our coupons so we only have active ones. We don’t want AdAssured coming after us.</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-default">Cancel</button>
                            </div>
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
            $('#summernote2').summernote({
                height:150
            });
            $('#startDate').datepicker({
                dateFormat: "mm/dd/yy"
            });
            $('#endDate').datepicker({
                dateFormat: "mm/dd/yy"
            });
            $('input.counter').textcounter({
                type: "character",
                max: 50,
                countDown: true,
                countSpaces: true,
                stopInputAtMaximum: true,
            });
        });
    </script>
@endsection