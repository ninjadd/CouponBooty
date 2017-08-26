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
                            Stores
                        </h3>
                        <span class="pull-right badge">{{ $stores->count() }}</span>
                    </div>

                    <div class="panel-body">

                        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Network</th>
                                <th>Managed By</th>
                                <th>Updated</th>
                                <th>Offers</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Network</th>
                                <th>Managed By</th>
                                <th>Updated</th>
                                <th>Offers</th>
                                <th></th>
                            </tr>
                            </tfoot>
                            @if(count($stores))
                                <tbody>
                                @foreach($stores as $store)
                                    <tr>
                                        <td>
                                            {{ $store->id }}
                                        </td>
                                        <td>
                                            {{ $store->name }}
                                        </td>
                                        <td>
                                            {{ $store->getNetworks($store->network_id) }}
                                        </td>
                                        <td>
                                            {{ $store->manager['name'] }}
                                        </td>
                                        <td>
                                            {{ $store->updated_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $store->offers->count() }}
                                        </td>
                                        <td>
                                            <form action="/store/{{ $store->id }}" method="POST">
                                                <div class="btn-group">
                                                    <a href="/store/{{ $store->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Store">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Store">
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