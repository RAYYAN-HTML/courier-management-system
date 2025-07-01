@extends('layout')
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

@section('content')
<!-- NAVBAR -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo / Brand -->
                <div class="flex-shrink-0">
                    <a href="{{ route('couriers.index') }}" class="text-2xl font-bold text-white hover:text-yellow-400">
                        Courier Management
                    </a>
                </div>
                
                <!-- Links -->
                <div class="flex space-x-4 items-center">
                    <a href="{{ route('couriers.index') }}" class="hover:bg-blue-500 px-3 py-2 rounded-md">Courier List</a>
                    <a href="{{ route('couriers.create') }}" class="hover:bg-blue-500 px-3 py-2 rounded-md">Add Courier</a>

                    <!-- Logout Form -->
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-yellow-400 hover:bg-yellow-300 text-black px-3 py-2 rounded-md">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
<div class="max-w-lg mx-auto mt-10 bg-white shadow-lg border border-blue-600 rounded-lg p-8">
    <h1 class="text-3xl font-bold text-black mb-6 text-center">
        {{ isset($courier) ? 'Edit Courier' : 'Add New Courier' }}
    </h1>

    @if($errors->any())
        <div class="mb-4 rounded-lg bg-yellow-100 border border-yellow-400 p-4 text-yellow-800">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form 
        action="{{ isset($courier) ? route('couriers.update', $courier->id) : route('couriers.store') }}" 
        method="POST"
        class="space-y-4"
    >
        @csrf
        @if(isset($courier))
            @method('PUT')
        @endif

        @if(isset($courier))
            <div>
                <label class="block text-sm font-medium text-black mb-1">Tracking Number</label>
                <input 
                    type="text" 
                    name="tracking_number" 
                    value="{{ $courier->tracking_number }}" 
                    readonly
                    class="w-full rounded-md border-gray-300 bg-gray-100 text-black focus:border-blue-500 focus:ring-blue-500"
                >
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-black mb-1">Sender Name</label>
            <input 
                type="text" 
                name="sender_name" 
                placeholder="Sender" 
                value="{{ old('sender_name', $courier->sender_name ?? '') }}"
                class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-black mb-1">Receiver Name</label>
            <input 
                type="text" 
                name="receiver_name" 
                placeholder="Receiver" 
                value="{{ old('receiver_name', $courier->receiver_name ?? '') }}"
                class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-black mb-1">Origin</label>
            <input 
                type="text" 
                name="origin" 
                placeholder="Origin" 
                value="{{ old('origin', $courier->origin ?? '') }}"
                class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-black mb-1">Destination</label>
            <input 
                type="text" 
                name="destination" 
                placeholder="Destination" 
                value="{{ old('destination', $courier->destination ?? '') }}"
                class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-black mb-1">Delivery Date</label>
            <input 
                type="date" 
                name="delivery_date" 
                value="{{ old('delivery_date', $courier->delivery_date ?? '') }}"
                class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
            >
        </div>

        <div>
            <label class="block text-sm font-medium text-black mb-1">Status</label>
            <select 
                name="status_id" 
                class="w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500"
            >
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ (old('status_id', $courier->status_id ?? '') == $status->id) ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="text-center mt-6">
            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2 px-6 rounded-md transition duration-200"
            >
                {{ isset($courier) ? 'Update' : 'Create' }}
            </button>
        </div>
    </form>
</div>
@endsection
