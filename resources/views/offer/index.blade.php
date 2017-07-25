@extends('layouts.app')

@section('head')
    @include('shared.datatables')
    <script>
        $(document).ready(function($) {
            $(".clickable-div").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <style>
        .clickable-div {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    @include('shared.errors')
    @include('shared.session')
    @include('shared.navbar')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left">
                        Offers
                    </h3>
                    <span class="badge pull-right">{{ $offers->count() }}</span>
                </div>

                <div class="panel-body">
                    <form action="/offer/bulk" method="POST">
                        {{ csrf_field() }}
                        <table class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <td colspan="10" align="center">
                                    <div class="btn-group">
                                        <input name="action_item" type="submit" class="btn btn-sm btn-success" value="Live">
                                        <input name="action_item" type="submit" class="btn btn-sm btn-warning" value="Archive">
                                        <input name="action_item" type="submit" class="btn btn-sm btn-info" value="Stage">
                                        <input name="action_item" type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Store</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th width="100px;">Last Modified By</th>
                                <th width="125px;">Created Date</th>
                                <th>Last Modified</th>
                                <th>Coupon</th>
                                <th width="60px;">Start Date</th>
                                <th width="60px;">End Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        @if(count($offers))
                            <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ ($offer->store['name']) ? $offer->store['name'] : 'N/A' }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ $offer->title }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ $offer->type->label }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ $offer->user->name }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ $offer->created_at }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ $offer->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ $offer->coupon }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ (!empty($offer->start_date)) ? $offer->start_date->format('Y-m-d') : null }}
                                    </td>
                                    <td class="clickable-div" data-href="/offer/{{ $offer->id }}/edit">
                                        {{ (!empty($offer->end_date)) ? $offer->end_date->format('Y-m-d') : null }}
                                    </td>
                                    <td>
                                        <div class="hidden">{{ $offer->id }}</div>
                                        <input type="checkbox" name="offer_ids[]" value="{{ $offer->id }}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
