@extends('layouts.base')
@section('title') | Cars list @endsection

<section id="app"> <cars-table-component :cars="{{$cars}}"></cars-table-component></section>
