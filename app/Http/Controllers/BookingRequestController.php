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

        return back()->with('success', 'تم إرسال طلب الحجز بنجاح');
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

        // إنشاء حجز جديد في جدول bookings
        Booking::create([
            'user_id' => $request->user_id,
            'package_type_id' => $request->package_type_id,
            'duration' => $request->duration,
            'price' => $request->price,
            'country' => $request->country,
        ]);

        return redirect()->route('admin.booking.requests.index')->with('success', 'تم قبول الطلب بنجاح وتم إنشاء الحجز.');
    }

    public function reject($id)
    {
        $request = BookingRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        return redirect()->route('admin.booking.requests.index')->with('success', 'تم رفض الطلب');
    }
}
