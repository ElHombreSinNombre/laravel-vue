@component('mail::message')

The car with model <b>{{$model}}</b> has been removed from {{ config('app.name') }}

<img src="{{$image}}" style="width: 25em; height: 25em;border-radius: 0.25em">

<br>Thanks<br>
@endcomponent
