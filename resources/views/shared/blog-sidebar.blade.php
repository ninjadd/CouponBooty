<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="form-group">
        <h4>Blog Search</h4>
        <label class="control-label">
            Search Bloggy Goodness
        </label>
        <form action="/blog" method="GET">
            {{ csrf_field() }}
            <div class="input-group">
                <input required="required" name="q" type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-primary glyphicon glyphicon-search" type="submit"></button>
                </span>
            </div>
        </form>
    </div>

    <div class="sidebar-module">
        <h4>Previous Posts</h4>
        <ul class="list-group">
            @if(count($side_blogs) > 0)
                @foreach($side_blogs as $side_blog)
                    <li class="list-group-item">
                        <a href="/blog/?month={{ $side_blog->month }}&year={{ $side_blog->year }}">
                            {{ $side_blog->month }} {{ $side_blog->year }}
                        </a>
                        <span class="badge">{{ $side_blog->posts }}</span>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>

</div>