@if($stores->count() > 0)
    <div class="container">
        <ul class="nav nav-tabs nav-justified">
            @foreach($stores as $store)
                <li><a {!! (str_contains(public_path(), $store->slug)) ? 'class"active"' : null !!} href="/{{ $store->slug }}">{{ $store->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endif