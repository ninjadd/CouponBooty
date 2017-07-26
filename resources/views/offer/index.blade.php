@extends('layouts.app')

@section('head')
    @include('shared.datatables')
    <script>
        $(document).ready(function () {
            $('.record_table tr').click(function (event) {
                if (event.target.type !== 'checkbox') {
                    $(':checkbox', this).trigger('click');
                }
            });

            $("input[type='checkbox']").change(function (e) {
                if ($(this).is(":checked")) {
                    $(this).closest('tr').addClass("highlight_row");
                } else {
                    $(this).closest('tr').removeClass("highlight_row");
                }
            });
        });
    </script>
    <style>
        .record_table {
            cursor: pointer;
        }
        .highlight_row {
            background: #eee;
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
                        <table class="table table-bordered table-condensed record_table" cellspacing="0" width="100%">
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
                                    <td>
                                        {{ ($offer->store['name']) ? $offer->store['name'] : 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $offer->title }}
                                    </td>
                                    <td>
                                        {{ $offer->type->label }}
                                    </td>
                                    <td>
                                        {{ $offer->user->name }}
                                    </td>
                                    <td>
                                        {{ $offer->created_at }}
                                    </td>
                                    <td>
                                        {{ $offer->updated_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ $offer->coupon }}
                                    </td>
                                    <td>
                                        {{ (!empty($offer->start_date)) ? $offer->start_date->format('Y-m-d') : null }}
                                    </td>
                                    <td>
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
