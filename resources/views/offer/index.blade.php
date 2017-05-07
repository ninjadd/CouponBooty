@extends('layouts.app')

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
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>

                        {{ $offers->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection