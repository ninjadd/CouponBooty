@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">

            @include('shared.errors')

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Update Banner Ad
                    </h3>
                </div>

                <div class="panel-body">

                    <form action="/bannerad/{{ $bannerAd->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <fieldset>
                            <legend>Edit Banner Ad Form</legend>

                            <div class="form-group">
                                <label for="marketplaceLable" class="col-lg-2 control-label">Marketplace</label>
                                <div class="col-lg-10">
                                    <p>{{ $bannerAd->marketplace->title }}</p>
                                    <input type="hidden" name="marketplace_id" value="{{ $bannerAd->marketplace->id }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="offerBody" class="col-lg-2 control-label">Marketplace HTML</label>
                                <div class="col-lg-10">
                                        <textarea required="required"
                                                  name="body"
                                                  class="form-control"
                                                  rows="3">{{ $bannerAd->body }}</textarea>
                                    <span class="help-block">You guessed it, this one is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="offerTitle" class="col-lg-2 control-label">Title</label>
                                <div class="col-lg-10">
                                    <input name="title"
                                           type="text"
                                           class="form-control counter"
                                           id="offerTitle"
                                           value="{{ $bannerAd->title }}"
                                           placeholder="This is an optional field now.">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="typeLabel" class="col-lg-2 control-label">Type</label>
                                <div class="col-lg-10">
                                    @foreach($types as $type)
                                        <label class="radio-inline">
                                            <input {{ ($bannerAd->type_id == $type->id) ? 'checked="checked"' : null }} required="required" type="radio" name="type_id" value="{{ $type->id }}">
                                            {{ $type->label }}
                                        </label>
                                    @endforeach
                                    <span class="help-block">Select one please these are required as well</span>
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
                                                id="offerCategories">{{ $bannerAd->categories }}</textarea>
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
                                           value="{{ (!empty($bannerAd->start_date)) ? $bannerAd->start_date->format('m/d/Y') : '' }}"
                                           placeholder="MM/DD/YYYY">
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
                                           value="{{ (!empty($bannerAd->end_date)) ? $bannerAd->end_date->format('m/d/Y') : '' }}"
                                           placeholder="MM/DD/YYYY">
                                    <span class="help-block">Not required. I think it will help us better manage our coupons so we only have active ones. We don’t want AdAssured coming after us.</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="typeLabel" class="col-lg-2 control-label">Status</label>
                                <div class="col-lg-10">
                                    <label class="radio-inline">
                                        <input type="radio" {{ ($bannerAd->archive == 0) ? 'checked="checked"' : null }} name="archive" value="0"> Live
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" {{ ($bannerAd->archive == 1) ? 'checked="checked"' : null }} name="archive" value="1"> Archive
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" {{ ($bannerAd->archive == 2) ? 'checked="checked"' : null }} name="archive" value="2"> Stage
                                    </label>
                                    <span class="help-block">Select one please these are required as well</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-success">Update</button>
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
