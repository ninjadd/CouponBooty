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
                <p class="lead">
                    {{ $offer->type->label }}
                </p>
                <p>
                    {!! $offer->body !!}
                </p>
            </div>
            <div class="modal-footer">
                <p class="pull-left">
                    <strong>Created By:</strong>
                    {{ $offer->user->name }}

                    <strong>Created At:</strong>
                    {{ $offer->created_at }}

                    <strong>Updated At:</strong>
                    {{ $offer->updated_at }}

                    <strong>Archived:</strong>
                    @if ($offer->archive == 0)
                        No
                    @elseif ($offer->archive == 1)
                        Yes
                    @endif
                </p>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>