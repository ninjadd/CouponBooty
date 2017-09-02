<ul class="collection with-header">
    <li class="collection-header"><h4>Stores</h4></li>
</ul>
<div class="collection">
    @foreach($stores as $store)
        <a href="/view/{{ $store->slug }}" class="collection-item purple-text text-lighten-1"><span class="badge purple lighten-1 white-text">{{ $store->offers->count() }}</span>{{ $store->name }}</a>
    @endforeach
</div>