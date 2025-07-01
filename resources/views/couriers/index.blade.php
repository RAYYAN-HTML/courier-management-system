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
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="bg-white border border-blue-600 rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-center text-black mb-6">Courier List</h1>

        @if(session('success'))
            <div class="mb-4 rounded-lg bg-yellow-100 border border-yellow-400 p-4 text-yellow-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('couriers.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                + Add New Courier
            </a>
        </div>

        @if(count($couriers))
            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full divide-y divide-blue-600">
                    <thead class="bg-blue-600 text-white sticky top-0">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Tracking #</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Sender</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Receiver</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Origin</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Destination</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($couriers as $courier)
                            <tr class="hover:bg-blue-50">
                                <td class="px-6 py-4 text-black whitespace-nowrap">{{ $courier->tracking_number }}</td>
                                <td class="px-6 py-4 text-black whitespace-nowrap">{{ $courier->sender_name }}</td>
                                <td class="px-6 py-4 text-black whitespace-nowrap">{{ $courier->receiver_name }}</td>
                                <td class="px-6 py-4 text-black whitespace-nowrap">{{ $courier->origin }}</td>
                                <td class="px-6 py-4 text-black whitespace-nowrap">{{ $courier->destination }}</td>
                                <td class="px-6 py-4 text-black whitespace-nowrap">{{ $courier->delivery_date }}</td>
                                <td class="px-6 py-4 text-black whitespace-nowrap">{{ $courier->status->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('couriers.edit', $courier->id) }}"
                                       class="text-blue-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('couriers.destroy', $courier->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline"
                                                onclick="return confirm('Delete this courier?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-600">No couriers found!</p>
        @endif
    </div>
</div>
@endsection
