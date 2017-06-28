@foreach($offers as $offer)
    <div class="col s3">
        <div class="card medium hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{ $offer->image_url }}">
            </div>
            <div class="card-content valign-wrapper">
                <span class="card-title activator grey-text text-darken-4">{{ $offer->title }}<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-action">
                <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
            </div>
            <div class="card-reveal valign-wrapper">
                <span class="card-title grey-text text-darken-4">{{ $offer->title }}<i class="material-icons right">close</i></span>
                @if($offer->coupon)
                    <br>
                    COPY:
                    <br>
                    <h5 class="z-depth-1-half ">{{ $offer->coupon }}</h5>
                    <br>
                    <a class="waves-effect waves-light deep-purple btn" href="{{ $offer->url }}" target="_blank">USE COUPON</a>
                    <br>
                    <p>{{ strip_tags($offer->body) }}</p>
                @else
                    <p>{{ strip_tags($offer->body) }}</p>
                    <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                @endif
            </div>
        </div>
    </div>
@endforeach