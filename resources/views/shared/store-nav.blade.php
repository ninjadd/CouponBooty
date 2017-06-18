@if($stores->count() > 0)
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            @foreach($stores as $store)
                <li {!! (str_contains(url()->current(), $store->slug)) ? 'class="active"' : null !!}><a href="/view/{{ $store->slug }}">{{ $store->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <br>
@endif