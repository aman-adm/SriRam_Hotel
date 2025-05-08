<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $about = AboutUs::first() ?? new AboutUs();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 'public');
            $about->image = $imagePath;
        }

        $about->content = $request->content;
        $about->save();

        return redirect()->back()->with('success', 'About Us updated successfully!');
    }
}

