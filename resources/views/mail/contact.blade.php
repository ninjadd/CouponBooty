@component('mail::message')
# Hello there some one from {{ config('app.name') }} has contacted you

@component('mail::panel')
    From: {{ $message->contact->name }}
    <br>
    At: {{ $message->contact->email }}
@endcomponent

@component('mail::panel')
    Message: {{ $message->body }}
@endcomponent


Thanks,<br>
{{ config('app.name') }} Administrator
@endcomponent
