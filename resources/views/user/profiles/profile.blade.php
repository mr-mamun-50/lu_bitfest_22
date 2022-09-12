@extends('layouts.app')
@section('title')
    Profile |
@endsection
@php
$menu = 'Profile';
@endphp


@section('content')
    @if (Auth::user()->category == 'student')
        @include('user.profiles.student')
    @elseif (Auth::user()->category == 'stuff')
        @include('user.profiles.teacher')
    @endif
@endsection
