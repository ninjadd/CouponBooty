@extends('layouts.app')

@section('head')
    @include('shared.datatables')
@endsection

@section('content')
        @include('shared.session')
        @include('shared.navbar')
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                            Dashboard
                        </h3>
                        <span class="badge pull-right">{{ $offers->count() }}</span>
                    </div>

                    <div class="panel-body">

                        <table class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                            <thead>
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
                                    <th width="75px;"></th>
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
                                            <form action="/offer/{{ $offer->id }}" method="POST">
                                                <div class="btn-group" role="group" aria-label="...">

                                                    <a href="/offer/{{ $offer->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Offer">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    @if($offer->archive == 0)
                                                        <a href="/offer/archive/{{ $offer->id }}" class="btn btn-warning btn-xs"  data-toggle="tooltip" title="Archive Offer">
                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                        </a>
                                                    @endif

                                                    @if(($offer->archive == 1))
                                                        <a href="/offer/archive/{{ $offer->id }}" class="btn btn-info btn-xs"  data-toggle="tooltip" title="Activate Offer">
                                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        </a>
                                                    @endif

                                                    <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Offer">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
@endsection
