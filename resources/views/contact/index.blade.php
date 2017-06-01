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
                            Contacts
                        </h3>
                    </div>

                    <div class="panel-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr class="info">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    First Added
                                </th>
                                <th>
                                    Last message
                                </th>
                                <th>
                                    Messages
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($contacts))
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>
                                            {{ $contact->name }}
                                        </td>
                                        <td>
                                            {{ $contact->email }}
                                        </td>
                                        <td>
                                            {{ $contact->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $contact->messages->last()->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            {{ $contact->messages->count() }}
                                        </td>
                                        <td>
                                            <form action="/contact/{{ $contact->id }}" method="POST">
                                                <div class="btn-group btn-group-sm pull-right">

                                                    <a href="/contact/{{ $contact->id }}" class="btn btn-default btn-xs"  data-toggle="tooltip" title="View Blog Post">
                                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
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