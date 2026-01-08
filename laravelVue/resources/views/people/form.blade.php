@extends('layouts.base')
@section('title') | {{ __('Person-form') }} @endsection

<section id="app">
    <people-form-component :cars="{{$cars}}" :person="{{isset($person) ? $person->toJson():'null'}}"></people-form-component>
</section>
