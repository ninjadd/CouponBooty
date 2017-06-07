<script>
    $("input[type='text']").click(function () {
        $(this).select();
    });
</script>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal{{ $offer->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $offer->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    {{ $offer->title }}
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    {{ $offer->type->label }}
                </p>
                <p>
                    Coupon
                    <br>
                    <input class="input-sm" type="text" value="{{ $offer->coupon }}">
                </p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary pull-left" href="{{ $offer->url }}" target="_blank">Go To Site</a>
            </div>
        </div>
    </div>
</div>