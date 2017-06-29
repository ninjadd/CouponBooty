@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-12">

                @include('shared.errors')

                <div class="panel panel-info">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                            {{ $contact->name }}
                        </h3>
                    </div>

                    <div class="panel-body">

                        <p>
                            <strong>Name:</strong> {{ $contact->name }}
                        </p>
                        <p>
                            <strong>Email:</strong> {{ $contact->email }}
                        </p>

                    </div>

                    @if(count($contact->messages))
                        <ul class="list-group">
                            <li class="list-group-item active">
                                Messages
                                <span class="badge">
                                    {{ $contact->messages->count() }}
                                </span>
                                <p class="text-muted">
                                    <em>Created:</em> {{ $contact->created_at->toDayDateTimeString() }}
                                </p>
                            </li>
                            @foreach($contact->messages as $message)
                                <li class="list-group-item">
                                    {{ $message->body }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="panel-footer">

                    </div>
                </div>
            </div>
        </div>

@endsection