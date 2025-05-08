<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class RamController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('user.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('user.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'phone'           => 'required|string|max:20',
            'check_in_date'   => 'required|date',
            'check_out_date'  => 'required|date|after:check_in_date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('products.create')
                ->withErrors($validator)
                ->withInput();
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->email = $request->input('email');
        $product->phone = $request->input('phone');
        $product->check_in_date = $request->input('check_in_date');
        $product->check_out_date = $request->input('check_out_date');
        $product->save();

        return redirect()
            ->route('products.index')
            ->with('success', 'Room added successfully');
    }
 // make sure this is included

// Show the edit form
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('user.products.edit', compact('product'));
}

// Update the booking
public function update(Request $request, $id)
{
    $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'check_in_date' => 'required|date',
        'check_out_date' => 'required|date|after:check_in_date',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()
            ->route('products.edit', $id)
            ->withErrors($validator)
            ->withInput();
    }

    $product = Product::findOrFail($id);
    $product->name = $request->input('name');
    $product->email = $request->input('email');
    $product->phone = $request->input('phone');
    $product->check_in_date = $request->input('check_in_date');
    $product->check_out_date = $request->input('check_out_date');
    $product->save();

    return redirect()->route('products.index')->with('success', 'Booking updated successfully.');
}

// Delete the booking
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Booking deleted successfully.');
}

}
