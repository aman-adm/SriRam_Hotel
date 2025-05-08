<?php
namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Room;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use Razorpay\Api\Api;
class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        $users = auth()->user();
      
        return view('user.dashboard', compact('users','bookings'));
    }
    public function setting()
    {
        return view('user.setting');
    }
}