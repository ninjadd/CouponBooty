@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.session')
                @include('shared.errors')

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Edit Offer
                        </h3>
                    </div>

                    <div class="panel-body">
                        <form action="/offer/{{ $offer->id }}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>Edit Offer Form</legend>

                                <div class="form-group">
                                    <label for="offerTitle" class="col-lg-2 control-label">Title</label>
                                    <div class="col-lg-10">
                                        <input required="required"
                                               name="title"
                                               type="text"
                                               class="form-control"
                                               id="offerTitle"
                                               value="{{ $offer->title }}"
                                               placeholder="All great offers start with great title">
                                        <span class="help-block">This is a required field so don't mess it up</span>
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
                                               value="{{ $offer->url }}"
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
                                               value="{{ $offer->image_url }}"
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
                                                  id="summernote">{!! $offer->body !!}</textarea>
                                        <span class="help-block">You guessed it, this one is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="typeLabel" class="col-lg-2 control-label">Type</label>
                                    <div class="col-lg-10">
                                        @foreach($types as $type)
                                            <label class="radio-inline">
                                                @if($offer->type_id == $type->id)
                                                    <input type="radio" name="type_id" value="{{ $type->id }}" checked="checked">
                                                @else
                                                    <input type="radio" name="type_id" value="{{ $type->id }}">
                                                @endif

                                                {{ $type->label }}
                                            </label>
                                        @endforeach
                                        <span class="help-block">Select one please these are required as well</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="storeLable" class="col-lg-2 control-label">Store</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="store_id" id="select">
                                            @if($stores->count() > 0)
                                                <option>Select</option>
                                                @foreach($stores as $store)
                                                    <option {!! ($store->id == $offer->store_id) ? 'selected="selected"' : null !!} value="{{ $store->id }}">{{ $store->name }}</option>
                                                @endforeach
                                            @else
                                                <option>Please Create Store First</option>
                                            @endif
                                        </select>
                                        <span class="help-block">Select Store to provide some awesome details</span>
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
                                                value="{{ $offer->coupon }}"
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
                                                placeholder="Add more here delete them below still comma separated please"
                                                id="offerCategories"></textarea>
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
                                               placeholder="YYYY-MM-DD"
                                               value="{{ (!empty($offer->start_date)) ? $offer->start_date : '' }}">
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
                                               placeholder="YYYY-MM-DD"
                                               value="{{ (!empty($offer->end_date)) ? $offer->end_date->format('Y-m-d') : '' }}">
                                        <span class="help-block">Not required. I think it will help us better manage our coupons so we only have active ones. We don’t want AdAssured coming after us.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <br>
                        <div class="col-lg-10 col-lg-offset-2">
                            <p class="text-muted">
                                Current Categories
                            </p>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <div class="pull-left">
                                        <form action="/category/{{ $category->id }}" method="POST">
                                            <button type="submit" class="btn btn-default btn-sm">
                                                {{ $category->name }} <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </div>

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
            $('#startDate').datepicker({
                dateFormat: "yy-mm-dd"
            });
            $('#endDate').datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
@endsection
