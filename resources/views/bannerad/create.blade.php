@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">

            @include('shared.errors')

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Create Banner Ad
                    </h3>
                </div>

                <div class="panel-body">

                    <form action="/bannerad" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>New Banner Ad Form</legend>

                            <div class="form-group">
                                <label for="offerTitle" class="col-lg-2 control-label">Title</label>
                                <div class="col-lg-10">
                                    <input required="required"
                                           name="title"
                                           type="text"
                                           class="form-control counter"
                                           id="offerTitle"
                                           value="{{ old('title') }}"
                                           placeholder="All great banner ads start with great title">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="marketplaceLable" class="col-lg-2 control-label">Marketplace</label>
                                <div class="col-lg-10">
                                    <p>{{ $marketplace->title }}</p>
                                    <input type="hidden" name="marketplace_id" value="{{ $marketplace->id }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="offerBody" class="col-lg-2 control-label">Marketplace HTML</label>
                                <div class="col-lg-10">
                                        <textarea required="required"
                                                  name="body"
                                                  class="form-control"
                                                  rows="3">{{ old('body') }}</textarea>
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
                                <label for="offerCategories" class="col-lg-2 control-label">Categories</label>
                                <div class="col-lg-10">
                                        <textarea
                                                name="categories"
                                                class="form-control"
                                                rows="3"
                                                placeholder="Comma separated for more than one"
                                                id="offerCategories">{{ $marketplace->categories }}</textarea>
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
                                           value="{{ old('end_date') }}"
                                           placeholder="MM/DD/YYYY">
                                    <span class="help-block">Not required. I think it will help us better manage our coupons so we only have active ones. We don’t want AdAssured coming after us.</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="typeLabel" class="col-lg-2 control-label">Status</label>
                                <div class="col-lg-10">
                                    <label class="radio-inline">
                                        <input type="radio" {{ (old('archive') == 0) ? 'checked="checked"' : null }} name="archive" value="0"> Live
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" {{ (old('archive') == 1) ? 'checked="checked"' : null }} name="archive" value="1"> Archive
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" {{ (old('archive') == 2) ? 'checked="checked"' : null }} name="archive" value="2"> Stage
                                    </label>
                                    <span class="help-block">Select one please these are required as well</span>
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
