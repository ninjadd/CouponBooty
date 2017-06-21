@if($stores->count() > 0)
    <li><a href="javascript:;">Shop</a>
        <ul class="sub-menu">
            @foreach($stores as $store)
                <li><a href="/view/{{ $store->slug }}">{{ $store->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif