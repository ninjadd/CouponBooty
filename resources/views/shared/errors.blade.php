@if (count($errors) > 0)
    <div class="col-md-8 col-md-offset-2 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif