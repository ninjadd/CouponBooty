@if($stores->count() > 0)
    @foreach($stores as $store)
        <li><a href="/view/{{ $store->slug }}">{{ $store->name }}</a></li>
    @endforeach
@endif