<?php

namespace App\Http\Controllers;

use App\Models\BookingRequest;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'package_type_id' => 'required|exists:package_types,id',
            'duration' => 'required|string',
            'price' => 'required|numeric',
            'country' => 'required|string',
        ]);

        BookingRequest::create($request->all());

        return back()->with('success', 'Your reservation request has been sent successfully');
    }

    public function index()
    {
        $requests = BookingRequest::all();
        return view('admin.booking_requests.index', compact('requests'));
    }

    public function accept($id)
    {
        $request = BookingRequest::findOrFail($id);
        $request->status = 'accepted';
        $request->save();

        Booking::create([
            'user_id' => $request->user_id,
            'package_type_id' => $request->package_type_id,
            'duration' => $request->duration,
            'price' => $request->price,
            'country' => $request->country,
        ]);

        return redirect()->route('admin.booking.requests.index')->with('success', 'The request was successfully accepted and the reservation was created.');
    }

    public function reject($id)
    {
        $request = BookingRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        return redirect()->route('admin.booking.requests.index')->with('success', 'The request was rejected');
    }
}
