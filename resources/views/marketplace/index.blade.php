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
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Marketplaces
                    </h3>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Updated</th>
                            <th>Banner Ads</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Updated</th>
                            <th>Banner Ads</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        @if(count($marketplaces))
                            <tbody>
                            @foreach($marketplaces as $marketplace)
                                <tr>
                                    <td>
                                        {{ $marketplace->id }}
                                    </td>
                                    <td>
                                        {{ $marketplace->title }}
                                    </td>
                                    <td>
                                        {{ $marketplace->created_at }}
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <form action="/marketplace/{{ $marketplace->id }}" method="POST">
                                            <div class="btn-group">
                                                {{--<a href="/marketplace/{{ $marketplace->id }}" class="btn btn-default btn-xs"  data-toggle="tooltip" title="View Marketplace">--}}
                                                    {{--<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>--}}
                                                {{--</a>--}}

                                                <a href="/marketplace/{{ $marketplace->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Marketplace">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Marketplace">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </button>
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            </div>
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