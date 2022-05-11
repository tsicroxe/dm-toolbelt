@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">

    <livewire:navbar />
    <livewire:sidebar />

    <div class="ml-16 flex flex-col items-center justify-start">
        @auth
        <p>You are logged in</p>
        @else
        <p>Welcome to the DM's Toolbelt</p>
        <p>Respectfully submitted by Andrew Banakus</p>
        <p>CSU Fullerton 2022</p>
        @endauth

    </div>
</div>

@endsection