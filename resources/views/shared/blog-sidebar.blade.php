
<div class="collection">
    @if(count($side_blogs) > 0)
        @foreach($side_blogs as $side_blog)
                <a class="collection-item" href="/blog/?month={{ $side_blog->month }}&year={{ $side_blog->year }}">
                    {{ $side_blog->month }} {{ $side_blog->year }}
                    <span class="badge">{{ $side_blog->posts }}</span>
                </a>
        @endforeach
    @endif
</div>