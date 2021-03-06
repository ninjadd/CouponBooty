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
                                            {{ $contact->created_at }}
                                        </td>
                                        <td>
                                            {{ $contact->messages->last()->created_at }}
                                        </td>
                                        <td>
                                            {{ $contact->messages->count() }}
                                        </td>
                                        <td>
                                            <form action="/contact/{{ $contact->id }}" method="POST">
                                                <div class="btn-group btn-group-sm pull-right">

                                                    <a href="/contact/{{ $contact->id }}" class="btn btn-default btn-xs"  data-toggle="tooltip" title="View Contact">
                                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                    </a>

                                                    <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Contact">
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