<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Hash;
use App\Models\booking;
class LoginController extends Controller
{
   
    public function index()
    {
        return view('user.login');
    }
    public function authenticate(Request $request)
    {
       $validator=validator::make($request->all(),[
           'email'=>'required|email',
           'password'=>'required',
       ]);
         if($validator->passes())
       {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->route('account.dashboard');
            }
            }
         else{
            return redirect()->route('account.login')->with('error','Invalid Credentials');
        }
        }else
         {
              return redirect()->route('account.login')
              ->withInput()
              ->withErrors($validator);
         }
        }
    public function register()
    {
        return view('user.register');
    }
    public function processregister(Request $request)
    {
        $validator=validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|confirmed|min:5',
            'name' => 'required',
        ]);
    if($validator->passes())
{
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = 'customer'; 
    $user->save();
    return redirect()->route('account.login')->with('success', 'Registration Successful');
}
else
{
    return redirect()->route('account.register')
    ->withInput()
    ->withErrors($validator);
}
}
public function settings()
{
    return view('user.settings'); 
}
public function bookings(){
    $rooms = booking::all();
    return view('user.booking', compact('rooms'));
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
public function logout()
{
    Auth::logout();
    return redirect()->route('account.login');
}
}