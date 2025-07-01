@extends('layout')
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white border border-blue-600 shadow-lg rounded-lg mt-10">
    <h2 class="text-2xl font-bold text-center text-black mb-6">Courier Details</h2>

    <div class="space-y-3 text-black">
        <p><strong>Tracking Number:</strong> {{ $courier->tracking_number }}</p>
        <p><strong>Sender:</strong> {{ $courier->sender_name }}</p>
        <p><strong>Receiver:</strong> {{ $courier->receiver_name }}</p>
        <p><strong>Origin:</strong> {{ $courier->origin }}</p>
        <p><strong>Destination:</strong> {{ $courier->destination }}</p>
        <p><strong>Delivery Date:</strong> {{ $courier->delivery_date }}</p>
        <p><strong>Status:</strong> {{ $courier->status->name ?? 'N/A' }}</p>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('track.form') }}"
           class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md inline-block">
            Track Another
        </a>
    </div>
</div>
@endsection
