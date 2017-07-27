@extends('layouts.app')

@section('head')
    @include('shared.summernote')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('shared.session')
            @include('shared.errors')
            @include('shared.navbar')
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Edit Offers
                    </h3>
                </div>

                <div class="panel-body">
                    @foreach($offers as $offer)
                        <div class="col-lg-4 panel">
                            <form action="/offer/{{ $offer->id }}" method="POST">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <strong for="offerTitle" class="control-label">Title</strong>
                                    <input required="required"
                                           name="title"
                                           type="text"
                                           class="form-control counter"
                                           id="offerTitle"
                                           value="{{ $offer->title }}"
                                           placeholder="All great offers start with great title">
                                </div>

                                <div class="form-group">
                                    <strong for="offerUrl" class="control-label">Offer URL</strong>
                                    <input required="required"
                                           name="url"
                                           type="url"
                                           class="form-control"
                                           id="offerUrl"
                                           value="{{ $offer->url }}"
                                           placeholder="This is where the advertiser URL goes">
                                </div>

                                <div class="form-group">
                                    <strong for="storeLable" class="control-label">Store:</strong>
                                    {{ $offer->store['name'] }}
                                    <input type="hidden" name="store_id" value="{{ $offer->store_id }}" />
                                </div>

                                <div class="form-group">
                                    <strong for="offerBody" class="control-label">Offer Text</strong>
                                    <textarea required="required"
                                              name="body"
                                              class="summernote">{!! $offer->body !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <strong for="typeLabel" class="control-label">Type:</strong>
                                    {{ $offer->type['label'] }}
                                    <input type="hidden" name="type_id" value="{{ $offer->type_id }}" />
                                </div>

                                <div class="form-group">
                                    <strong for="coupon" class="control-label">Coupon</strong>
                                    <input
                                            name="coupon"
                                            type="text"
                                            class="form-control"
                                            id="coupon"
                                            value="{{ $offer->coupon }}"
                                            placeholder="This is the Coupon or Code or whatever you want to call it">
                                </div>

                                <div class="form-group">
                                    <strong for="startDate" class="control-label">Start Date</strong>
                                    <input name="start_date"
                                           type="text"
                                           class="form-control startDate"
                                           placeholder="MM/DD/YYYY"
                                           value="{{ (!empty($offer->start_date)) ? $offer->start_date->format('m/d/Y') : '' }}">
                                </div>

                                <div class="form-group">
                                    <strong for="endDate" class="control-label">End Date</strong>
                                    <input name="end_date"
                                           type="text"
                                           class="form-control endDate"
                                           placeholder="MM/DD/YYYY"
                                           value="{{ (!empty($offer->end_date)) ? $offer->end_date->format('m/d/Y') : '' }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/offer/{{ $offer->id }}/edit" class="btn btn-default" target="_blank">Edit Individual Offer</a>
                                </div>
                                <input type="hidden" name="action_item" value="Edit">
                                @foreach($offer_ids as $offer_id)
                                    <input type="hidden" name="offer_ids[]" value="{{ $offer_id }}">
                                @endforeach
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 100
            });
            $('.startDate').datepicker({
                dateFormat: "mm/dd/yy"
            });
            $('.endDate').datepicker({
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