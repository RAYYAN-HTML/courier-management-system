@extends('layout')
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
@section('content')
<nav class="bg-blue-600 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <div class="text-xl font-bold">
            Courier Tracking
        </div>
        <div class="flex space-x-4 items-center">
            <a href="{{ route('track.form') }}" class="hover:bg-blue-500 px-3 py-2 rounded">Track Courier</a>
            <a href="{{ route('login') }}" class="hover:bg-yellow-400 text-black px-3 py-2 rounded">Are you Admin?</a>
        </div>
    </div>
</nav>


<div class="max-w-xl mx-auto p-6 bg-white border border-blue-600 shadow-lg rounded-lg mt-10">
    <h2 class="text-2xl font-bold text-center text-black mb-6">Track Your Courier</h2>

    @if(session('error'))
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 p-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('track.lookup') }}">
        @csrf
        <label for="tracking_number" class="block text-black mb-2">Enter Tracking Number</label>
        <input type="text" name="tracking_number" id="tracking_number" required
               class="w-full border border-blue-600 rounded-md p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md w-full">
            Track
        </button>
    </form>
</div>
@endsection
