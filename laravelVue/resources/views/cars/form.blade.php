@extends('layouts.base')
@section('title') | Car form @endsection

<section id="app">
    <cars-form-component :car="{{$car ?? 'null'}}"></cars-form-component>
</section>
