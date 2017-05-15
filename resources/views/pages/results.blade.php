@extends('layouts.pages')



@section('content')
    @include('shared.menu')

    @include('shared.search')

    <div class="rs_graybg rs_knowledgebase_page_shadow  rs_bottompadder70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="rs_forum_tab_section">
                        <div class="rs_forum_upper_tabwrapper">
                            <ul class="nav nav-tabs">
                                <li><a>Newest</a></li>
                                <li class="pull-right" ><a href="#" disabled="disabled">Showing ({{ $offers->count() }}) Results for "{{ $request->search_text }}"</a></li>
                            </ul>
                        </div>

                        <div class="rs_forum_tab_detail">
                            <div class="tab-content">
                                <div class="rs_forum_tab_info">
                                    <p>We work with clients big and small across a range of sectors and we utilise all forms of media to get your name out there in a way that’s right for you. We work with clients big and small across a range of sectors and we utilise all forms of media to get your name out there in a way that’s right for you.We work with clients big and small across a range of sectors and we utilise all forms of media to get your name out there in a way that’s right for you.</p>
                                </div>
                                @if($offers->count() > 0)
                                    <div class="tab-pane active">
                                        @foreach($offers as $offer)
                                            <div class="rs_topicdiv">
                                                <div class="rs_topic_img">
                                                    <img src="http://placehold.it/70X70" class="img-responsive" alt="">
                                                    <p>{{ $offer->user->name }}</p>
                                                </div>
                                                <div class="rs_topic_data">
                                                    <h5>{{ $offer->title }}</h5>
                                                    <h6>posted, <a href="#"> {{ $offer->created_at->toDayDateTimeString() }}</a></h6>
                                                    <p>{!! $offer->body !!}</p>
                                                    @if( $offer->categories->count() > 0)
                                                        <ul>
                                                            @foreach($offer->categories as $category)
                                                                <li><a href="#" class="rs_topic_data_clr{{ $loop->iteration }}">{{ $category->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                <div class="rs_topic_data_footer">
                                                    <ul>
                                                        <li>
                                                            <div class="rs_total_replies">
                                                                <p>{{ $offer->categories->count() }} Categories</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="rs_last_replies">
                                                                <div class="rs_last_replies_info">
                                                                    <p>Last Updated</p>
                                                                    <span>{{ $offer->updated_at->diffForHumans() }}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection