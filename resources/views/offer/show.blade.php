@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">View Offer #{{ $offer->id }}</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>Offer Title:</strong>
                            {{ $offer->title }}
                        </p>
                        <p>
                            <strong>Offer Body:</strong>
                            {{ $offer->body }}
                        </p>
                        <p>
                            <strong>Offer Type:</strong>
                            {{ $offer->type->label }}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <p>
                            <strong>Created By</strong>
                            {{ $offer->user->name }}

                            <strong>Created At</strong>
                            {{ $offer->created_at }}

                            <strong>Updated At</strong>
                            {{ $offer->updated_at }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection