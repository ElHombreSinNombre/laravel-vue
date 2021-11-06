@extends('layouts.base')
@section('title') | Car form @endsection

<section id="app">
    <cars-form-component :car="{{isset($car) ? $car->toJson():'null'}}"></cars-form-component>
</section>
