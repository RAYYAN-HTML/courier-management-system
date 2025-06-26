<form action="{{ route('couriers.store') }}" method="POST">
    @csrf
    <input name="tracking_number" placeholder="Tracking Number">
    <input name="sender_name" placeholder="Sender">
    <input name="receiver_name" placeholder="Receiver">
    <input name="origin" placeholder="Origin">
    <input name="destination" placeholder="Destination">
    <input name="delivery_date" type="date">
    <select name="status_id">
        @foreach($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>
