@extends('layouts.base')

@section('body')
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
