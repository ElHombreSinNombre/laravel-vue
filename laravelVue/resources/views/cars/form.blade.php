@extends('layouts.base')
@section('title') | Car form @endsection

<section id="app">
    <cars-form-component :id="{{$id ?? 'null'}}"></cars-form-component>
</section>
