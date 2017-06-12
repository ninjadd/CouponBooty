@extends('layouts.app')

@section('head')
    @include('shared.datatables')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.session')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Dashboard
                        </h3>
                    </div>

                    <div class="panel-body">

                        @include('shared.navbar')

                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th>Coupon</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            @if(count($offers))
                                <tbody>
                                @foreach($offers as $offer)
                                    <tr>
                                        <td>
                                            {{ $offer->id }}
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
                                            {{ $offer->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $offer->coupon }}
                                        </td>
                                        <td>
                                            {{ (!empty($offer->start_date)) ? $offer->start_date->format('Y-m-d') : '' }}
                                        </td>
                                        <td>
                                            {{ (!empty($offer->end_date)) ? $offer->end_date->format('Y-m-d') : '' }}
                                        </td>
                                        <td>
                                            <form action="/offer/{{ $offer->id }}" method="POST">
                                                <div class="btn-group">
                                                    {{--<button type="button" class="btn btn-default btn-xs"  data-toggle="modal" title="View Offer" data-target="#myModal{{ $offer->id }}">--}}
                                                        {{--<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>--}}
                                                    {{--</button>--}}

                                                    {{--@include('offer.show')--}}

                                                    <a href="/offer/{{ $offer->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Offer">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    <a href="/offer/archive/{{ $offer->id }}" class="btn btn-warning btn-xs"  data-toggle="tooltip" title="Archive Offer">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </a>

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
    </div>
@endsection
