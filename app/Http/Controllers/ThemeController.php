<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ColorModel;
class ThemeController extends Controller
{
    public function index()
    {
        $data = ColorModel::first();
        return view('admin.theme.color', compact('data')); 
    }
    public function updateFirst(Request $request)
    {
        $data = ColorModel::findOrFail(1);
        $rules = [
        'text_color'=> 'required|string|max:20',
        'base_color'=> 'required|string|max:20',        
        ];
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $data->update([
            'text_color' => $request->text_color,
            'base_color' => $request->base_color,    
        ]);
        return redirect()->back()->with('success', 'Details updated successfully');
    }
}
