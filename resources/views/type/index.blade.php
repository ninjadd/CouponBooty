@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "lengthMenu": [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "All"]]
            });
        } );
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('shared.session')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Types
                        </h3>
                    </div>

                    <div class="panel-body">

                        @include('shared.navbar')

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
                                            {{ $type->offer->count() }}
                                        </td>
                                        <td>
                                            <form action="/type/{{ $type->id }}" method="POST">
                                                <a href="/type/{{ $type->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Type">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Type">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                </button>
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