<?php
namespace App\Http\Controllers;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Gallary;
use App\Models\Contact;
use App\Models\ColorModel;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Slide;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function home()
    {
        $slides = Slide::all();
        $data = ColorModel::first();
        $rooms = Room::all();
        $about = AboutUs::first(); 
        $gallary = Gallary::all();
        $blogs = Blog::all();
        return view('index', compact('rooms', 'gallary','data','slides','about','blogs'));
    }
    public function form()
{
    $rooms = Room::all();
    return view('form', compact('rooms'));
}
    public function room_details($id)
    {
        $data = ColorModel::first();
        $rooms = Room::find($id); 
        return view('room_details', compact('rooms','data'));
    }
    public function our_room() {
        $data = ColorModel::first();
        $rooms = Room::whereDoesntHave('bookings')->get();
        $booking = new Booking();
        $rooms = Room::all();
        return view('our_room', compact('rooms','data','booking'));
    }
    public function gallery () {
        $data = ColorModel::first();
        $gallary = Gallary::all();
        return view('gallery', compact('gallary','data'));
        }
    public function about () {
        $data = ColorModel::first();
        $about = AboutUs::first(); 
        return view('about', compact('data','about'));
        }
    public function blog () {
        $data = ColorModel::first();
        $blogs = Blog::all();
        $blogs = Blog::all();
        return view('blog', compact('blogs','data'));
        }
       

// public function add_booking(Request $request, $roomId)
// {
//     // Ensure the user is authenticated before proceeding
//     if (!Auth::check()) {
//         return redirect()->route('login')->with('error', 'Please login to make a booking.');
//     }

//     // Ensure Razorpay payment ID exists when payment is made via Razorpay
//     if (!$request->has('razorpay_payment_id')) {
//         return redirect()->back()->with('error', 'Payment was not successful.');
//     }

//     // Initialize Razorpay API instance
//     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

//     // Validate payment with Razorpay
//     try {
//         $payment = $api->payment->fetch($request->razorpay_payment_id);
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Invalid Razorpay payment ID.');
//     }

//     // Check room availability
//     $startDate = Carbon::parse($request->start_date);
//     $endDate = Carbon::parse($request->end_date);

//     $existingBooking = Booking::where('room_id', $roomId)
//         ->where(function ($query) use ($startDate, $endDate) {
//             $query->whereBetween('start_date', [$startDate, $endDate])
//                 ->orWhereBetween('end_date', [$startDate, $endDate])
//                 ->orWhere(function ($query) use ($startDate, $endDate) {
//                     $query->where('start_date', '<=', $startDate)
//                           ->where('end_date', '>=', $endDate);
//                 });
//         })
//         ->exists();

//     if ($existingBooking) {
//         return redirect()->back()->with('error', 'This room is already booked for the selected dates.');
//     }

//     // Save booking
//     Booking::create([
//         'user_id' => Auth::id(),
//         'room_id' => $roomId,
//         'name' => $request->name,
//         'email' => $request->email,
//         'phone' => $request->phone,
//         'start_date' => $request->start_date,
//         'end_date' => $request->end_date,
//         'check_in' => $request->start_date,
//         'check_out' => $request->end_date,
//         'adults' => $request->adults ?? 1,
//         'children' => $request->children ?? 0,
//         'payment_method' => 'razorpay',
//         'payment_id' => $request->razorpay_payment_id,
//         'payment_status' => 'paid',
//         'status' => 'confirmed',
//     ]);

//     return redirect()->with('success', 'Booking completed successfully!');
   
// }

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

        
    public function contact(Request $request){
        $data = ColorModel::first();
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        Mail::to($request->email)->send(new ContactMail($details));
        return redirect()->back()->with('success', 'Your message has been sent! Please check your email.');
    }
  
    public function search(Request $request)
    {
        $request->validate([
            'arrival' => 'required|date',
            'departure' => 'required|date|after:arrival',
        ]);
        $arrival = Carbon::parse($request->arrival);
        $departure = Carbon::parse($request->departure);
        $rooms = Room::whereDoesntHave('booking', function ($query) use ($arrival, $departure) {
            $query->whereBetween('check_in', [$arrival, $departure])
                  ->orWhereBetween('check_out', [$arrival, $departure]);
        })->get();

        return view('rooms.search_results', compact('rooms', 'arrival', 'departure'));
    }
    public function book()
    {
        $data = ColorModel::first($id);
        $rooms = Room::all();
        return view('book', compact('rooms', 'data'));  
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}