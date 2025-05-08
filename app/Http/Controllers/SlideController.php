<?php
namespace App\Http\Controllers;
use App\Models\Slide;
use Illuminate\Http\Request;
class SlideController extends Controller
{
    public function adminIndex()
    {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }
    public function create()
    {
        return view('admin.slides.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image',
        ]);
        $imagePath = $request->file('image')->store('slides', 'public');
        Slide::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.slides.index')->with('success', 'Slide added!');
    }
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        if (file_exists(storage_path('app/public/' . $slide->image))) {
            unlink(storage_path('app/public/' . $slide->image));
        }
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Slide deleted successfully!');
    }
}
