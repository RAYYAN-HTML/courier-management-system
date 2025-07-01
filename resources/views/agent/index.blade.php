@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">Agent Dashboard - Update Shipment Status</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(count($couriers))
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-blue-500 rounded-lg shadow-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">Tracking Number</th>
                        <th class="py-3 px-4 text-left">Sender</th>
                        <th class="py-3 px-4 text-left">Receiver</th>
                        <th class="py-3 px-4 text-left">Origin</th>
                        <th class="py-3 px-4 text-left">Destination</th>
                        <th class="py-3 px-4 text-left">Delivery Date</th>
                        <th class="py-3 px-4 text-left">Current Status</th>
                        <th class="py-3 px-4 text-left">Change Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($couriers as $courier)
                        <tr class="border-t hover:bg-blue-50">
                            <td class="py-3 px-4">{{ $courier->tracking_number }}</td>
                            <td class="py-3 px-4">{{ $courier->sender_name }}</td>
                            <td class="py-3 px-4">{{ $courier->receiver_name }}</td>
                            <td class="py-3 px-4">{{ $courier->origin }}</td>
                            <td class="py-3 px-4">{{ $courier->destination }}</td>
                            <td class="py-3 px-4">{{ $courier->delivery_date }}</td>
                            <td class="py-3 px-4 text-yellow-600 font-bold">{{ $courier->status->name ?? 'N/A' }}</td>
                            <td class="py-3 px-4">
                                <form action="{{ route('agent.updateStatus', $courier->id) }}" method="POST" class="flex space-x-2">
                                    @csrf
                                    <select name="status_id" class="border border-blue-300 rounded p-2">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ $courier->status_id == $status->id ? 'selected' : '' }}>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-500">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">No shipments found.</p>
    @endif
</div>
@endsection
