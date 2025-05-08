<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gallary;
use App\Models\Contact;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;
class GalleryController extends Controller
{
    public function view_gallary()
    {     
        $gallary = Gallary::all();
        return view('admin.gallary', compact('gallary'));
       
    }
    public function upload_gallary(Request $request)
    {
        $data = new Gallary();
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('gallary'), $imageName);
                $data = new Gallary();
                $data->image = $imageName;
                $data->save();
            }
        }
        return redirect()->back();
    }
    public function delete_gallary($id)
    {
        $gallary = Gallary::find($id);
        $gallary->delete();
        return redirect()->back();
    }
    public function all_messages()
    {
        $data = Contact::all();
        return view('admin.all_messages', compact('data'));
     
    }
    public function send_mail ($id){
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }
    public function mail(Request $request ,$id){
        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endlin,
            ];
            Notification :: send($data, new SendEmailNotification($details));
            return redirect()->back();   
    }   
}