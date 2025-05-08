<?php
namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    public function create()
    {
        return view('admin.blog.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);
        $imagePath = $request->file('image')->store('images/blog', 'public');
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.blog.index');
    }
    public function show()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }
    public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    $blog->delete();

    return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
}
}