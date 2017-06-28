@extends('layouts.app')

@section('content');
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $offer->title }}</h3>
            </div>
            <div class="panel-body">
                {!! $offer->body !!}
            </div>
            <div class="panel-footer">
                <strong>Created By:</strong>
                {{ $offer->user->name }}

                <strong>Created At:</strong>
                {{ $offer->created_at }}

                <strong>Updated At:</strong>
                {{ $offer->updated_at }}

                <strong>Archived:</strong>
                @if ($offer->archive == 0)
                    No
                @elseif ($offer->archive == 1)
                    Yes
                @endif

                <strong>Offer Type:</strong>
                {{ $offer->type->label }}
            </div>
        </div>
    </div>
@endsection