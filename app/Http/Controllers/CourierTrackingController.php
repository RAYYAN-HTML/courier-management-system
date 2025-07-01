<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;

class CourierTrackingController extends Controller
{
    public function showForm()
    {
        return view('track');
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required'
        ]);

        $courier = Courier::where('tracking_number', $request->tracking_number)
                          ->with('status')
                          ->first();

        if (!$courier) {
            return back()->with('error', 'Courier not found. Please check the tracking number.');
        }

        return view('track-result', compact('courier'));
    }
}
