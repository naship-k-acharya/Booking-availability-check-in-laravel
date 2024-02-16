<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{    
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
        ]);
    
        // Retrieve the input dates
        $checkInDate = Carbon::parse($validatedData['checkin']);
        $checkOutDate = Carbon::parse($validatedData['checkout']);
    
        // Query for overlapping bookings
        $overlapBookings = Booking::where('room_name', $request->input('room_name'))
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->where('checkin', '>=', $checkInDate)
                        ->where('checkin', '<', $checkOutDate);
                })->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->where('checkout', '>', $checkInDate)
                        ->where('checkout', '<=', $checkOutDate);
                });
            })->exists();
    
        // If there are overlapping bookings, inform the user and redirect back
        if ($overlapBookings) {
            return redirect()->back()->with('error', 'This room is not available for the selected dates.');
        }
    
        // Room is available and then proceed next
        $bookingData = $validatedData;
        $bookingData['room_name'] = $request->input('room_name');
        $bookingData['room_photo'] = $request->input('room_photo');
        $bookingData['room_prize'] = $request->input('room_prize');
    
        $booking = new Booking();
        $booking->fill($bookingData);
        $booking->save();
    
        return redirect('/list')->with('success', 'Booking successfully created.');
    }
}
