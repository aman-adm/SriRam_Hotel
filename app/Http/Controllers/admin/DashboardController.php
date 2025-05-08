<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\room;
use App\Models\user;


class DashboardController extends Controller
{
    public function index()
    {
        $Booking = Booking::count();
        $user = User::count();
        $room = Room::count();
        $rooms = Room::all();
        return view('admin.dashboard', compact('Booking','user','room','rooms'));
    
    }

}
