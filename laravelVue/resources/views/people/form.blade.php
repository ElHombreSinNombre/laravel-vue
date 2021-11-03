@extends('layouts.base')
@section('title') | Person form @endsection

<section id="app">
    <people-form-component :person="{{$person ?? 'null'}}"></people-form-component>
</section>
