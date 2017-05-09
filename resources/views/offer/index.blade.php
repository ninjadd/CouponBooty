@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "order": [[ 5, "desc" ]],
                "lengthMenu": [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "All"]]
            });
        } );
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>
                            Offers
                        </h3>
                    </div>

                    <div class="panel-body">

                        @include('shared.navbar')

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
                                        Type
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
                                        Archived
                                    </th>
                                </tr>
                            </thead>
                            @if(!empty($offers))
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
                                                {{ $offer->updated_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                @if($offer->archive == 0)
                                                    No
                                                @else
                                                    Yes
                                                @endif
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