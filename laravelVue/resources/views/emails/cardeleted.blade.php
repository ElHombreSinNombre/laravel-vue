@component('mail::message')

El coche ha sido de baja del sistema

@component('mail::button', ['url' => ''])
Ir a la página
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
