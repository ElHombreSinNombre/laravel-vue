@extends('layouts.base')
@section('title') | People list @endsection

<section id="app"> <people-table-component :people="{{$people}}"></people-table-component></section>


