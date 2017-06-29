@if($type_list->count() > 0)
    @foreach($type_list as $type)
        <li><a href="/types/{{ urlencode($type->label) }}">{{ $type->label }}</a></li>
    @endforeach
@endif