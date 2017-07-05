@foreach($offers as $offer)
    <div class="col s12 m6 l2 xl2">
        <div class="card medium hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{ $offer->image_url }}">
            </div>
            <div class="card-content">
                <h6 class="card-title activator grey-text text-darken-4">{{ $offer->title }}<i class="material-icons right">more_vert</i></h6>
            </div>
            <div class="card-action">
                @if($offer->coupon)
                    <a class="waves-effect activator waves-light btn deep-purple">See Details</a>
                @else
                    <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                @endif
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{ $offer->title }}<i class="material-icons right">close</i></span>
                @if($offer->coupon)
                    <br>
                    COPY:
                    <br>
                    <h5 class="z-depth-1-half teal-text text-darken-3 bold center-align">{{ $offer->coupon }}</h5>
                    <br>
                    <a class="waves-effect waves-light deep-purple btn" href="{{ $offer->url }}" target="_blank">USE COUPON</a>
                    <p>{{ strip_tags($offer->body) }}</p>
                @else
                    <br>
                    <a class="waves-effect waves-light btn deep-orange" href="{{ $offer->url }}" target="_blank">Get Deal</a>
                    <p>{{ strip_tags($offer->body) }}</p>
                @endif
                <a href="https://twitter.com/home?status={{ urlencode($offer->url) }}" target="_blank">
                    <i class="fa fa-twitter-square fa-2x blue-grey-text" aria-hidden="true"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($offer->url) }}" target="_blank">
                    <i class="fa fa-facebook-square fa-2x blue-grey-text" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach