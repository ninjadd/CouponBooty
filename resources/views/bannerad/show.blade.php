@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        View Banner Ad | {{ $bannerAd->title }}
                    </h3>
                </div>

                <div class="panel-body">
                    {!! $bannerAd->body !!}
                </div>

                <div class="panel-footer">
                    <a href="/bannerad/{{ $bannerAd->id }}/edit" class="btn btn-success">Edit</a>
                </div>
            </div>

        </div>
    </div>

@endsection