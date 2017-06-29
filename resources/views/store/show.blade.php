@extends('layouts.app')

@section('content')


        <div class="row">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ $store->title }}
                    </h3>
                </div>

                <div class="panel-body">
                    {!! $store->body !!}
                </div>

                <div class="panel-footer">
                    Total <em>{{ $store->name }}</em> Deals <span class="badge">{{ $store->offers->count() }}</span>
                </div>
            </div>

        </div>


@endsection