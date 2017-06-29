@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-12">

                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                            SOP: {{ $quad->title }}
                        </h3>
                        <a class="btn btn-info btn-sm pull-right" href="/quad/{{ $quad->id }}/edit">Edit</a>
                    </div>

                    <div class="panel-body">

                        {!! $quad->body !!}

                    </div>

                    <div class="panel-footer">
                        <strong>Created By:</strong>
                        {{ $quad->user->name }}

                        <strong>Created At:</strong>
                        {{ $quad->created_at }}

                        <strong>Updated At:</strong>
                        {{ $quad->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    
@endsection