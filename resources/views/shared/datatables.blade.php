<link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
<script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.bootstrap.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "order": [[ 4, "desc" ]],
            "lengthMenu": [[50, 75, 100, 125, 150, 175, 200, -1], [50, 75, 100, 125, 150, 175, 200, "All"]]
        });
    } );
</script>