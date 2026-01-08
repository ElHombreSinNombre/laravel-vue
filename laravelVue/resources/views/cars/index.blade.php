@extends('layouts.base')
@section('title') | {{ __('Cars-list') }} @endsection

<section id="app"> <cars-table-component :cars="{{$cars}}" :user="{{ Auth::user()}}"></cars-table-component></section>
