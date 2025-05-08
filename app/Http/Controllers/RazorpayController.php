<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\ServerError;

class RazorpayController extends Controller
{
    use \Illuminate\Foundation\Validation\ValidatesRequests;  // Add this line to use validation

    /**
     * Show the Razorpay payment form.
     */
    public function index()
    {
        return view('razorpay');
    }

    /**
     * Handle the payment request and create a Razorpay order.
     */
    public function payment(Request $request)
    {
        // Validate the request data, ensure 'amount' is present and is numeric
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1', // Ensure amount is present and is a valid number
        ]);

        try {
            $amount = $request->input('amount');

            // Instantiate the Razorpay API class using environment variables
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Prepare the order data
            $orderData = [
                'receipt'         => 'order_' . rand(1000, 9999), // Generate a unique receipt ID
                'amount'          => $amount * 100, // Razorpay expects the amount in paise (100 paise = 1 INR)
                'currency'        => 'INR', // Currency code
                'payment_capture' => 1, // Automatically capture payment
            ];

            // Create the order using Razorpay API
            $order = $api->order->create($orderData);

            // Store order ID and amount in session to be used in the frontend
            session([
                'orderId' => $order['id'],
                'amount'  => $amount * 100, // Razorpay expects the amount in paise
            ]);

            // Return the payment page view with order ID and amount
            return view('payment', [
                'orderId' => $order['id'],
                'amount'  => $amount * 100, // Razorpay expects the amount in paise
            ]);
        } catch (ServerError $e) {
            // Log the error for debugging
            \Log::error('Razorpay Server Error: ' . $e->getMessage());
            return response()->json(['error' => 'Server error occurred. Please try again later.']);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('General Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    
}
