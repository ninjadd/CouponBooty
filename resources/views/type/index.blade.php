@extends('layouts.app')

@section('head')
    @include('shared.datatables')
@endsection

@section('content')
    <div class="container">
            @include('shared.session')
            @include('shared.navbar')
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Types
                            </h3>
                        </div>

                        <div class="panel-body">

                            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Label</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Offers</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Label</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Offers</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                                @if(count($types))
                                    <tbody>
                                    @foreach($types as $type)
                                        <tr>
                                            <td>
                                                {{ $type->id }}
                                            </td>
                                            <td>
                                                {{ $type->label }}
                                            </td>
                                            <td>
                                                {{ $type->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                {{ $type->updated_at }}
                                            </td>
                                            <td>
                                                {{ $type->offers->count() }}
                                            </td>
                                            <td>
                                                <form action="/type/{{ $type->id }}" method="POST">
                                                    <div class="btn-group">
                                                        <a href="/type/{{ $type->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Type">
                                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                        </a>

                                                        <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Type">
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
    </div>
@endsection