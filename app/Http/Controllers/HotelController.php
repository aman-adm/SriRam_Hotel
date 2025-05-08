<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hotel;
class HotelController extends Controller
{   
public function search(Request $request)
{
    $request->validate([
        'arrival' => 'required|date',
        'departure' => 'required|date|after:arrival',
    ]);
    $arrival = $request->input('arrival');
    $departure = $request->input('departure');
    $rooms = Hotel::whereDoesntHave('bookings', function ($query) use ($arrival, $departure) {
        $query->where(function ($q) use ($arrival, $departure) {
            $q->where('arrival_date', '<', $departure)
              ->where('departure_date', '>', $arrival);
        });
    })->get();
    return view('hotel.available_rooms', compact('rooms', 'arrival', 'departure'));
}
public function bookings()
{
    return $this->hasMany(Booking::class);
}public function room()
{
    return $this->belongsTo(Hotel::class);
}
}
