@component('mail::message')

{{$model}} has been removed.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
