<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DownLoadOurAppModel;
use Illuminate\Support\Facades\Validator;
use App\Models\Logo;
use Illuminate\Support\Str;
class LogoController extends Controller
{
    public function admin_logo(Request $request)
    {
        $data['getRecord'] = Logo::all();
        return view('admin.logo.list', $data);
    }
    public function admin_logo_post(Request $request)
    {
        $isAdd = $request->add_to_update === "Add";
        $rules = [
            'logo_icon' => $isAdd ? 'required|image|mimes:png,jpg,jpeg,svg,ico|max:2048' : 'nullable|image|mimes:png,jpg,jpeg,svg,ico|max:2048',
            'favicon_icon' => $isAdd ? 'required|image|mimes:png,jpg,jpeg,svg,ico|max:1024' : 'nullable|image|mimes:png,jpg,jpeg,svg,ico|max:1024',
            'status' => 'required|in:active,inactive',
            'action' => 'required|in:show,hide',
        ];
        $request->validate($rules);
        $logoRecord = $isAdd ? new Logo : Logo::find($request->id);
        if (!$logoRecord) {
            return redirect()->back()->with('error', 'Logo record not found.');
        }
        if ($request->hasFile('logo_icon')) {
            $logoRecord->logo_icon = $this->uploadImage($request->file('logo_icon'), 'logo', $logoRecord->logo_icon);
        }
        if ($request->hasFile('favicon_icon')) {
            $logoRecord->favicon_icon = $this->uploadImage($request->file('favicon_icon'), 'logo', $logoRecord->favicon_icon);
        }
        $logoRecord->status = $request->status;
        $logoRecord->action = $request->action;
        $logoRecord->save();
        return redirect()->back()->with('success', 'Logo and favicon updated successfully.');
    }
    private function uploadImage($file, $path, $oldFile = null)
    {
        if ($oldFile && file_exists(public_path("$path/$oldFile"))) {
            unlink(public_path("$path/$oldFile"));
        }
        $filename = Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $filename);
        return $filename;
    }
}