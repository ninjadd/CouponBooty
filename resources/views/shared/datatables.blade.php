<link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
<script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.bootstrap.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "order": [[ 5, "desc" ]],
            "lengthMenu": [[25, 50, 75, 100, 125, -1], [25, 50, 75, 100, 125, "All"]]
        });
    } );
</script>