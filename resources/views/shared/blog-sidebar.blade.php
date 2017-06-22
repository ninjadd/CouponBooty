{{--<!-- Blog Sidebar Widgets Column -->--}}
{{--<div class="col-md-4">--}}

    {{--<!-- Blog Search Well -->--}}
    {{--<div class="form-group">--}}
        {{--<h4>Blog Search</h4>--}}
        {{--<label class="control-label">--}}
            {{--Search Bloggy Goodness--}}
        {{--</label>--}}
        {{--<form action="/blog" method="GET">--}}
            {{--{{ csrf_field() }}--}}
            {{--<div class="input-group">--}}
                {{--<input required="required" name="q" type="text" class="form-control">--}}
                {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-primary glyphicon glyphicon-search" type="submit"></button>--}}
                {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</div>--}}

    {{--<div class="sidebar-module">--}}
        {{--<h4>Previous Posts</h4>--}}
        {{--<ul class="list-group">--}}
            {{--@if(count($side_blogs) > 0)--}}
                {{--@foreach($side_blogs as $side_blog)--}}
                    {{--<li class="list-group-item">--}}
                        {{--<a href="/blog/?month={{ $side_blog->month }}&year={{ $side_blog->year }}">--}}
                            {{--{{ $side_blog->month }} {{ $side_blog->year }}--}}
                        {{--</a>--}}
                        {{--<span class="badge">{{ $side_blog->posts }}</span>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            {{--@endif--}}

        {{--</ul>--}}
    {{--</div>--}}

{{--</div>--}}

<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
    <div class="rs_sidebar_wrapper_second">

        <aside class="widget widget_search">
            <form action="/blog" method="GET">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="q" required="required" class="form-control" placeholder="Search Blog">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </aside>

        <aside class="widget rs_widget_categories">
            <h4 class="widget-title">Previous Posts</h4>
            <ul>
                @if(count($side_blogs) > 0)
                    @foreach($side_blogs as $side_blog)
                        <li>
                            <a href="/blog/?month={{ $side_blog->month }}&year={{ $side_blog->year }}">
                                {{ $side_blog->month }} {{ $side_blog->year }}
                                <span>({{ $side_blog->posts }})</span>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </aside>

        {{--<aside class="widget rs_widget_tag_cloud">--}}
            {{--<h4 class="widget-title">Tags</h4>--}}
            {{--<div class="rs_tag_cloud_box">--}}
                {{--<a href="#" class="ed_btn ed_orange">Design</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">Jquery</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">Material</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">WordPress</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">Joomla</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">Wireframe</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">Plus</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">App</a>--}}
                {{--<a href="#" class="ed_btn ed_orange">Development</a>--}}
            {{--</div>--}}
        {{--</aside>--}}

        {{--<aside class="widget rs_widget_post">--}}
            {{--<h4 class="widget-title">Recent Post</h4>--}}
            {{--<ul>--}}
                {{--<li>--}}
                    {{--<div class="rs_widget_post_img"><img src="http://placehold.it/80X80" alt="" class="img-responsive"></div>--}}
                    {{--<div class="rs_widget_post_data">--}}
                        {{--<p><a href="#">Recent Work and Clients to see what</a></p>--}}
                        {{--<span>Oct 27, 2015</span>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<div class="rs_widget_post_img"><img src="http://placehold.it/80X80" alt="" class="img-responsive"></div>--}}
                    {{--<div class="rs_widget_post_data">--}}
                        {{--<p><a href="#">These are the services that we can offer</a></p>--}}
                        {{--<span>Oct 27, 2015</span>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<div class="rs_widget_post_img"><img src="http://placehold.it/80X80" alt="" class="img-responsive"></div>--}}
                    {{--<div class="rs_widget_post_data">--}}
                        {{--<p><a href="#">Whether you want a corporate promotional</a></p>--}}
                        {{--<span>Oct 27, 2015</span>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<div class="rs_widget_post_img"><img src="http://placehold.it/80X80" alt="" class="img-responsive"></div>--}}
                    {{--<div class="rs_widget_post_data">--}}
                        {{--<p><a href="#">Our highly skilled graphic designers will produce</a></p>--}}
                        {{--<span>Oct 27, 2015</span>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</aside>--}}

        {{--<aside class="widget rs_widget_archive">--}}
            {{--<h4 class="widget-title">Archive</h4>--}}
            {{--<ul>--}}
                {{--<li><a href="#">Oct 2015 <span>(26)</span></a></li>--}}
                {{--<li><a href="#">Nov 2015 <span>(32)</span></a></li>--}}
                {{--<li><a href="#">Dec 2015 <span>(89)</span></a></li>--}}
                {{--<li><a href="#">Jan 2016 <span>(48)</span></a></li>--}}
                {{--<li><a href="#">Feb 2016 <span>(23)</span></a></li>--}}
                {{--<li><a href="#">Mar 2016 <span>(36)</span></a></li>--}}
            {{--</ul>--}}
        {{--</aside>--}}

        {{--<aside class="widget rs_widget_advertisement">--}}
            {{--<h4 class="widget-title">Advertisement</h4>--}}
            {{--<img src="http://placehold.it/263X253" alt="" class="img-responsive">--}}
            {{--<img src="http://placehold.it/263X253" alt="" class="img-responsive">--}}
        {{--</aside>--}}
    </div>
</div>