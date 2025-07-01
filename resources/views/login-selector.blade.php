@extends('layout')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white border border-blue-600 shadow-lg rounded-lg mt-10">
    <h2 class="text-2xl font-bold text-center text-black mb-6">Welcome to Courier System</h2>
    <div class="space-y-4">
        <a href="{{ route('track.form') }}"
           class="block text-center bg-yellow-400 text-black hover:bg-yellow-300 px-4 py-2 rounded-md">
            I am a Customer (Track Package)
        </a>
        <a href="{{ route('login') }}?role=admin"
           class="block text-center bg-blue-600 text-white hover:bg-blue-500 px-4 py-2 rounded-md">
            I am Admin (Login)
        </a>
        <a href="{{ route('login') }}?role=agent"
           class="block text-center bg-black text-white hover:bg-gray-800 px-4 py-2 rounded-md">
            I am Agent (Login)
        </a>
    </div>
</div>
@endsection
