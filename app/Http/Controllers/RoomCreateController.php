<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;
class RoomCreateController extends Controller
{
    public function room_create()
    {
        
        return view('admin.room_create');      
    }
    public function add_room(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|array', 
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $room = new Room();
        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi ? true : false;
        $room->room_type = $request->type;
        $room->adults = $request->adults;
        $room->children = $request->children;
        $room->save();
        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                $imageName = time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/rooms'), $imageName);
                $imagePaths[] = 'uploads/rooms/' . $imageName;
            }
            $room->image = json_encode($imagePaths);
            $room->save();
        }
    
        return redirect()->back()->with('success', 'Room Added Successfully with Images');
    }
    public function view_room()
    {
        $rooms = Room::all();
        return view('admin.view_room', compact('rooms'));
    }
    public function destroy(Room $room)
    {
        if ($room->image && file_exists(public_path('uploads/rooms/' . $room->image))) {
            unlink(public_path('uploads/rooms/' . $room->image));
        }
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted successfully!');
    }
    public function room_update($id){
        $room = Room::find($id);
        return view('admin.room_edit', compact('room'));
    }
    public function edit_room(Request $request, $id) {
        $room = Room::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'wifi' => 'required|string',
            'description' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
        ]);
        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->type;
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/rooms'), $imageName);
                $images[] = 'uploads/rooms/' . $imageName;
            }
            $room->images = json_encode($images); 
        }
        $room->save();
        return redirect()->back()->with('success', 'Room Updated Successfully');
    }
}

    


    

