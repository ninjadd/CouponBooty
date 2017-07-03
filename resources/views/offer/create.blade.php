@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12">

                @include('shared.errors')

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Create Offer
                        </h3>
                    </div>

                    <div class="panel-body">

                        <form action="/offer" method="POST">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>New Offer Form</legend>

                                <div class="form-group">
                                    <label for="offerTitle" class="col-lg-2 control-label">Title</label>
                                    <div class="col-lg-10">
                                        <input required="required"
                                                name="title"
                                                type="text"
                                                class="form-control counter"
                                                id="offerTitle"
                                                value="{{ old('title') }}"
                                                placeholder="All great offers start with great title">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="offerUrl" class="col-lg-2 control-label">Offer URL</label>
                                    <div class="col-lg-10">
                                        <input required="required"
                                               name="url"
                                               type="url"
                                               class="form-control"
                                               id="offerUrl"
                                               value="{{ old('url') }}"
                                               placeholder="This is where the advertiser URL goes">
                                        <span class="help-block">This one is also required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="imageUrl" class="col-lg-2 control-label">Image URL</label>
                                    <div class="col-lg-10">
                                        <input required="required"
                                               name="image_url"
                                               type="url"
                                               class="form-control"
                                               id="imageUrl"
                                               value="{{ old('image_url') }}"
                                               placeholder="This is where the URL for the Advertiser's image goes">
                                        <span class="help-block">This is also required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="offerBody" class="col-lg-2 control-label">Offer Text</label>
                                    <div class="col-lg-10">
                                        <textarea required="required"
                                                  name="body"
                                                  class="form-control"
                                                  rows="3"
                                                  id="summernote">{{ old('body') }}</textarea>
                                        <span class="help-block">You guessed it, this one is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="typeLabel" class="col-lg-2 control-label">Type</label>
                                    <div class="col-lg-10">
                                        @foreach($types as $type)
                                            <label class="radio-inline">
                                                <input {{ (old('type_id') == $type->id) ? 'checked="checked"' : null }} type="radio" name="type_id" value="{{ $type->id }}">
                                                {{ $type->label }}
                                            </label>
                                        @endforeach
                                        <span class="help-block">Select one please these are required as well</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="storeLable" class="col-lg-2 control-label">Store</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" required="required" name="store_id" id="select">
                                            @if($stores->count() > 0)
                                                <option>Select</option>
                                                @foreach($stores as $store)
                                                    <option {{ (old('store_id') == $store->id) ? 'selected="selected"' : null }} value="{{ $store->id }}">{{ $store->name }}</option>
                                                @endforeach
                                            @else
                                                <option>Please Create Store First</option>
                                            @endif
                                        </select>
                                        <span class="help-block">Select Store to provide some awesome details</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="network" class="col-lg-2 control-label">Network</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="network_id" id="network">
                                            <option>Select Network</option>
                                            @foreach($networks as $network)
                                                <option {{ (old('network_id') == $network->id) ? 'selected="selected"' : null }} value="{{ $network->id }}">{{ $network->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block">You know why this is here</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="coupon" class="col-lg-2 control-label">Coupon</label>
                                    <div class="col-lg-10">
                                        <input
                                               name="coupon"
                                               type="text"
                                               class="form-control"
                                               id="coupon"
                                               value="{{ old('coupon') }}"
                                               placeholder="This is the Coupon or Code or whatever you want to call it">
                                        <span class="help-block">This is not required so you could call it optional if you like</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="offerCategories" class="col-lg-2 control-label">Categories</label>
                                    <div class="col-lg-10">
                                        <textarea
                                                  name="categories"
                                                  class="form-control"
                                                  rows="3"
                                                  placeholder="Comma separated for more than one"
                                                  id="offerCategories">{{ old('categories') }}</textarea>
                                        <span class="help-block">This will help with search and filtering later on</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="startDate" class="col-lg-2 control-label">Start Date</label>
                                    <div class="col-lg-10">
                                        <input name="start_date"
                                               type="text"
                                               class="form-control"
                                               id="startDate"
                                               value="{{ old('start_date') }}"
                                               placeholder="YYYY-MM-DD">
                                        <span class="help-block">Not required. I think it will help us better manage our coupons so we only have active ones. We don’t want AdAssured coming after us.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="endDate" class="col-lg-2 control-label">End Date</label>
                                    <div class="col-lg-10">
                                        <input name="end_date"
                                               type="text"
                                               class="form-control"
                                               id="endDate"
                                               value="{{ old('end_date') }}"
                                               placeholder="YYYY-MM-DD">
                                        <span class="help-block">Not required. I think it will help us better manage our coupons so we only have active ones. We don’t want AdAssured coming after us.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                    </div>
                                </div>
                            </fieldset>
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
            $('#startDate').datepicker({
                dateFormat: "yy-mm-dd"
            });
            $('#endDate').datepicker({
                dateFormat: "yy-mm-dd"
            });
            $('input.counter').textcounter({
                type: "character",
                max: 100,
                countDown: true,
                countSpaces: true,
                stopInputAtMaximum: true,
            });
        });
    </script>
@endsection
