@extends('layouts.base')
@section('title') | Person form @endsection

<section id="app">
    <people-form-component :id="{{$id ?? 'null'}}"></people-form-component>
</section>
