@extends('layouts.app')
@section('title')
    Home |
@endsection
@php
$menu = 'Home';
@endphp


@section('content')
    @if (Auth::user()->category == 'student')
        @include('dashboards.student')
    @elseif (Auth::user()->category == 'stuff')
        @include('dashboards.teacher')
    @elseif (Auth::user()->category == 'driver')
        @include('dashboards.driver')
    @endif
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
