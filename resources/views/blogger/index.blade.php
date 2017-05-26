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
                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                            Blog Posts
                        </h3>
                        <div class="btn-group pull-right">
                            <a class="btn btn-info" href="/blogger?filter=all">
                                All Posts
                                <span class="badge">{{ $all->count() }}</span>
                            </a>
                            <a class="btn btn-info" href="/blogger?filter=archived">
                                Archived Posts
                                <span class="badge">{{ $archived->count() }}</span>
                            </a>
                            <a class="btn btn-info" href="/blogger?filter=unarchived">
                                Unarchived Posts
                                <span class="badge">{{ $unarchived->count() }}</span>
                            </a>
                            <a class="btn btn-info" href="/blogger/create">
                                New Blog Post
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </div>
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
                                    Created At
                                </th>
                                <th>
                                    Updated At
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($blogs))
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>
                                            {{ $blog->id }}
                                        </td>
                                        <td>
                                            {{ $blog->title }}
                                        </td>
                                        <td>
                                            {{ $blog->user->name }}
                                        </td>
                                        <td>
                                            {{ $blog->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $blog->updated_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <form action="/blogger/{{ $blog->id }}" method="POST">
                                                <div class="btn-group btn-group-sm pull-right">

                                                    <a href="/blogger/{{ $blog->id }}" class="btn btn-default btn-xs"  data-toggle="tooltip" title="View Blog Post">
                                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    </a>

                                                    <a href="/blogger/{{ $blog->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Blog Post">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>

                                                    <a href="/blogger/archive/{{ $blog->id }}" class="btn btn-warning btn-xs"  data-toggle="tooltip" title="Archive Blog Post">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </a>

                                                    <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Blog Post">
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
    </div>

@endsection