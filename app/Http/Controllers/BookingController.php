<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\booking;
use App\Models\PaymentMethod;
use App\Models\Room; 
class BookingController extends Controller
{
    public function bookings()
    {
        $rooms = booking::all();
        return view('admin.booking', compact('rooms'));
    }
    
    public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->back()->with('success', 'Booking deleted successfully.');
}
public function approve_book($id){
    $booking = Booking::findOrFail($id);
    $booking->status = 'approve';
    $booking->save();
    return redirect()->back();
}
public function reject_book($id){
    $booking = Booking::findOrFail($id);
    $booking->status = 'reject';
    $booking->save();
    return redirect()->back();
}

public function checkAvailability(Request $request)
{
    $start_date = $request->start_date;
    $end_date = $request->end_date;
    $adults = $request->adults;
    $children = $request->children;
    $rooms = Room::where('adults', '=', $adults)
        ->where('children', '=', $children)
        ->whereDoesntHave('bookings', function ($query) use ($start_date, $end_date) {
            $query->where(function ($q) use ($start_date, $end_date) {
                $q->whereBetween('start_date', [$start_date, $end_date])
                  ->orWhereBetween('end_date', [$start_date, $end_date])
                  ->orWhere(function ($q2) use ($start_date, $end_date) {
                      $q2->where('start_date', '<=', $start_date)
                         ->where('end_date', '>=', $end_date);
                  });
            });
        })
        ->get();
    return view('rooms.available', compact('rooms', 'start_date', 'end_date'));
}

public function add_booking(Request $request, $roomId)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'razorpay_payment_id' => 'required|string',
    ]);

    // Add booking logic here, for example:
    $booking = new Booking();
    $booking->room_id = $roomId;
    $booking->user_id = Auth::id();
    $booking->name = $request->name;
    $booking->email = $request->email;
    $booking->phone = $request->phone;
    $booking->start_date = $request->start_date;
    $booking->end_date = $request->end_date;
    $booking->razorpay_payment_id = $request->razorpay_payment_id;
    $booking->status = 'pending'; // Set the status of booking (you can change it based on the payment verification)
    $booking->save();

    return redirect()->route('booking.success');
}

public function store(Request $request)
{
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'adults' => 'required|integer|min:1',
        'children' => 'nullable|integer|min:0',
        'payment_method' => 'required|string',
    ]);

    if (Auth::check()) {
        // Create booking if user is authenticated
        Booking::create([
            'user_id' => Auth::id(),           // Ensure user_id is correct
            'room_id' => $request->room_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'check_in' => $request->start_date,
            'check_out' => $request->end_date,
            'adults' => $request->adults,
            'children' => $request->children,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.success')->with('success', 'Booking successful!');
    } else {
        // Redirect user to login page if not authenticated
        return redirect()->route('login')->with('error', 'Please login to make a booking.');
    }
}


public function success()
    {
       
        // Return a view or some success message
        return view('booking.success'); // Or return a response
    }



}