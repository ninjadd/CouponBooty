@foreach($offers as $offer)
    <div class="col s12 m6 l4 xl3">
        <div class="card medium hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{ $offer->image_url }}">
            </div>
            <div class="card-content valign-wrapper">
                <span class="card-title activator grey-text text-darken-4 flow-text">{{ $offer->title }}<i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card-action">
                <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4 flow-text">{{ $offer->title }}<i class="material-icons right">close</i></span>
                @if($offer->coupon)
                    <br>
                    COPY:
                    <br>
                    <h5 class="z-depth-1-half teal-text text-darken-3 bold center-align">{{ $offer->coupon }}</h5>
                    <br>
                    <a class="waves-effect waves-light deep-purple btn" href="{{ $offer->url }}" target="_blank">USE COUPON</a>
                    <br>
                    <p class="flow-text">{{ strip_tags($offer->body) }}</p>
                @else
                    <p class="flow-text">{{ strip_tags($offer->body) }}</p>
                    <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                @endif
                <br>
                <a href="https://twitter.com/home?status={{ $offer->url }}" target="_blank">
                    <i class="fa fa-twitter-square fa-3x blue-grey-text" aria-hidden="true"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $offer->url }}" target="_blank">
                    <i class="fa fa-facebook-square fa-3x blue-grey-text" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach