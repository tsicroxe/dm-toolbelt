@extends('layouts.base')

@section('body')

    <livewire:navbar /> 
    <livewire:sidebar />
     
    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
