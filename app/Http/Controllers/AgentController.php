<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Status;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $couriers = Courier::with('status')->get();
        $statuses = Status::all();

        return view('agent.index', compact('couriers', 'statuses'));
    }

    public function updateStatus(Request $request, Courier $courier)
    {
        $validated = $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $courier->update([
            'status_id' => $validated['status_id'],
        ]);

        return redirect()->route('agent.index')->with('success', 'Status updated!');
    }
}
