@extends('layouts.app')

@section('head')
    @include('shared.datatables')
@endsection

@section('content')

        <div class="row">
            <div class="col-md-12">

                @include('shared.session')
                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                            The Quad&trade;
                        </h3>
                        <a class="btn btn-info pull-right" href="/quad/create">
                            New SOP
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr class="info">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Created By
                                </th>
                                <th>
                                    Created Date
                                </th>
                                <th>
                                    Last Modified
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($quads))
                                @foreach($quads as $quad)
                                    <tr>
                                        <td>
                                            {{ $quad->id }}
                                        </td>
                                        <td>
                                            {{ str_limit($quad->title, 40, ' . . .') }}
                                        </td>
                                        <td>
                                            {{ $quad->user->name }}
                                        </td>
                                        <td>
                                            {{ $quad->created_at }}
                                        </td>
                                        <td>
                                            {{ $quad->updated_at }}
                                        </td>
                                        <td>
                                            <form action="/quad/{{ $quad->id }}" method="POST">
                                                <div class="btn-group btn-group-sm pull-right">

                                                    <a href="/quad/{{ $quad->id }}" class="btn btn-default btn-xs"  data-toggle="tooltip" title="View SOP">
                                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    </a>

                                                    <a href="/quad/{{ $quad->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit SOP">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete SOP">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                                    </button>

                                                </div>
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


@endsection