@if($stores->count() > 0)
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            By Store <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            @foreach($stores as $store)
                <li><a href="/view/{{ $store->slug }}">{{ $store->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif