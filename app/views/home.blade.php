@extends('layouts.default')
@section('title', 'Home')
@section('content')

@if(!Auth::check())
@include('user.login')
@else
@include('ribbits');
@endif
@stop