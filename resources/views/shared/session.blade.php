@if (session('status'))

    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Hey Look!</h4>
        <p>{{ session('status') }}</p>
    </div>

@endif

@if (session('message'))

    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Alright!</h4>
        <p>{{ session('message') }}</p>
    </div>

@endif