<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Status;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        $couriers = Courier::with('status')->get();
        return view('couriers.index', compact('couriers'));
    }

    public function create()
    {
        $statuses = Status::all();
        return view('couriers.form', ['statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required',
            'receiver_name' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'status_id' => 'required|exists:statuses,id',
            'delivery_date' => 'required|date',
        ]);

        $validated['tracking_number'] = $this->generateTrackingNumber();

        Courier::create($validated);

        return redirect()->route('couriers.index')->with('success', 'Courier Created!');
    }

    public function edit(Courier $courier)
    {
        $statuses = Status::all();
        return view('couriers.form', compact('courier', 'statuses'));
    }

    public function update(Request $request, Courier $courier)
    {
        $validated = $request->validate([
            'sender_name' => 'required',
            'receiver_name' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'status_id' => 'required|exists:statuses,id',
            'delivery_date' => 'required|date',
        ]);

        $courier->update($validated);

        return redirect()->route('couriers.index')->with('success', 'Courier Updated!');
    }

    public function destroy(Courier $courier)
    {
        $courier->delete();
        return redirect()->route('couriers.index')->with('success', 'Courier Deleted!');
    }

    private function generateTrackingNumber()
    {
        do {
            $number = '';
            for ($i = 0; $i < 16; $i++) {
                $number .= mt_rand(0, 9);
            }
        } while (Courier::where('tracking_number', $number)->exists());

        return $number;
    }
}
