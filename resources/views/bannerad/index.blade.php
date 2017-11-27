@extends('layouts.app')

@section('head')
    @include('shared.datatables')
@endsection

@section('content')
    @include('shared.session')
    @include('shared.navbar')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Banner Ads
                    </h3>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Marketplace</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Last Modified By</th>
                            <th>Created Date</th>
                            <th>Last Modified</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Marketplace</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Last Modified By</th>
                            <th>Created Date</th>
                            <th>Last Modified</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        @if(count($bannerAds))
                            <tbody>
                            @foreach($bannerAds as $bannerAd)
                            <tr>
                                <td>
                                    {{ $bannerAd->marketplace->title }}
                                </td>
                                <td>
                                    {{ $bannerAd->title }}
                                </td>
                                <td>
                                    {{ $bannerAd->type->label }}
                                </td>
                                <td>
                                    {{ $bannerAd->user->name }}
                                </td>
                                <td>
                                    {{ $bannerAd->created_at }}
                                </td>
                                <td>
                                    {{ $bannerAd->updated_at }}
                                </td>
                                <td>
                                    {{ (!empty($bannerAd->start_date)) ? $bannerAd->start_date->format('Y-m-d') : null }}
                                </td>
                                <td>
                                    {{ (!empty($bannerAd->end_date)) ? $bannerAd->end_date->format('Y-m-d') : null }}
                                </td>
                                <td>
                                    <div class="hidden">{{ $bannerAd->id }}</div>
                                    <form action="/bannerad/{{ $bannerAd->id }}" method="POST">
                                        <div class="btn-group">
                                            <a href="/bannerad/{{ $bannerAd->id }}" class="btn btn-default btn-xs"  data-toggle="tooltip" title="Show Banner Ad">
                                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                            </a>

                                            <a href="/bannerad/{{ $bannerAd->id }}/edit" class="btn btn-success btn-xs"  data-toggle="tooltip" title="Edit Banner Ad">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete Banner Ad">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                        </div>
                                    </form>
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

@endsection