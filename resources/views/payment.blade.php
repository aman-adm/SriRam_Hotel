<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Payment</title>
</head>
<body>
    <h1>Processing Payment...</h1>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}", // Your Razorpay Key ID
            "amount": "{{ $amount }}", // Amount in paise (e.g., 1000 = ₹10)
            "currency": "INR",
            "name": "Acme Corp",
            "description": "Test Transaction",
            "order_id": "{{ $orderId }}", // Order ID from Razorpay

            "handler": function (response) {
                alert("Payment Successful. Razorpay Payment ID: " + response.razorpay_payment_id);
                // Optionally: make an AJAX POST to your server to verify payment and store it
            },

            "prefill": {
                "name": "Gaurav Kumar",
                "email": "gaurav.kumar@example.com",
                "contact": "9000090000"
            },

            "notes": {
                "address": "Razorpay Corporate Office"
            },

            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>
</body>
</html>
