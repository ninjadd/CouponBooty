@extends('layouts.out')

@section('head')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100379036-1', 'auto');
        ga('send', 'pageview');

    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <blockquote>
                <h3>Stores</h3>
            </blockquote>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="pagination">
                    @foreach($initial_stores as $key => $value)
                        <li class="waves-effect hoverable"><a href="#{{ $key }}">{{ is_int($key) ? '#' : strtoupper($key) }}</a></li>
                    @endforeach
                </ul>
                <div id="popout">
                    <ul class="collapsible popout" data-collapsible="accordion">
                        @foreach($initial_stores as $key => $value)
                            <li>
                                <div id="{{ $key }}" class="collapsible-header"><i class="material-icons right">view_list</i>{{ is_int($key) ? '#' : strtoupper($key) }}</div>
                                <div class="collapsible-body">
                                    <ul>
                                        @for ($i = 0; $i < sizeof($value); $i++)
                                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> <a href="/view/{{ $value[$i]['slug'] }}">{{ $value[$i]['name'] }}</a></li>
                                        @endfor
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('foot');
<script>
    $(document).ready(function(){
        $(document).ready(function(){
            $('.collapsible').collapsible();
            $( ".collapsible div" ).mouseover(function() { $(this).trigger('click'); })
        });
    });
</script>
@endsection