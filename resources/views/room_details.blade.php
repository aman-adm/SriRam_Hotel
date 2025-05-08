@extends('HomeLayout.home')

<head>
    <style>
        .main-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            cursor: pointer;
        }
        .thumbnail {
            width: 100%;
            height: 100px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 8px;
            transition: transform 0.3s;
        }
        .thumbnail:hover {
            transform: scale(1.05);
        }
        .thumbnail-wrapper {
            overflow-y: auto;
            max-height: 400px;
        }
        .modal-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

@section('content')

<div class="container py-5" style="background-image: url('{{ asset('images/background.jpg') }}'); background-size: cover; background-position: center;">
    <div class="row mb-5 text-center">
        <div class="col-12">
            <h2 style="font-size: 2.5rem; font-weight: bold; color: #333;">Our Rooms</h2>
            <p class="subtitle" style="font-size: 1.2rem; color: #666;">Explore comfort and luxury at its finest</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="shadow rounded overflow-hidden p-4" style="background-color: #fff; border-radius: 16px;">
                
                @php
                    $images = $rooms->image ? json_decode($rooms->image, true) : [];
                @endphp

                @if (count($images) > 0)
                <div class="row">
                    <div class="col-md-2 thumbnail-wrapper d-flex flex-column align-items-center">
                        @foreach($images as $image)
                            <img src="{{ asset($image) }}" class="thumbnail mb-2" onclick="changeMainImage('{{ asset($image) }}')" alt="Thumbnail">
                        @endforeach
                    </div>
                    <div class="col-md-10">
                        <img id="mainImage" src="{{ asset($images[0]) }}" class="main-image" alt="Main Room Image" data-bs-toggle="modal" data-bs-target="#imageModal">
                    </div>
                </div>
                @else
                    <img src="{{ asset('default-image.jpg') }}" class="main-image" alt="Default Image">
                @endif

                <div class="mt-5">
                    <h3 style="font-size: 2rem; font-weight: 700; margin-bottom: 20px; color: #222;">{{ $rooms->room_title }}</h3>
                    <p style="font-size: 1.1rem; color: #555; margin-bottom: 25px; line-height: 1.6;">{!! $rooms->description !!}</p>

                    <table class="table table-borderless mb-4">
                        <tbody>
                            <tr><td class="fw-bold text-dark">Price:</td><td class="text-muted">₹{{ $rooms->price }}</td></tr>
                            <tr><td class="fw-bold text-dark">Free Wifi:</td><td class="text-muted">{{ $rooms->wifi ? 'Yes' : 'No' }}</td></tr>
                            <tr><td class="fw-bold text-dark">Room Type:</td><td class="text-muted">{{ $rooms->room_type }}</td></tr>
                            <tr><td class="fw-bold text-dark">Adult Capacity:</td><td class="text-muted">{{ $rooms->adults }}</td></tr>
                            <tr><td class="fw-bold text-dark">Child Capacity:</td><td class="text-muted">{{ $rooms->children }}</td></tr>
                        </tbody>
                    </table>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Room</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Viewing Image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Room Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="modal-img" alt="Room Image">
      </div>
    </div>
  </div>
</div>

<!-- Booking Modal -->
<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title text-white" id="bookingModalLabel">Book Your Stay</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                <form id="bookingForm" action="{{ url('add_booking', $rooms->id) }}" method="POST">
                    @csrf
                    <!-- Name and Email Fields -->
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="flex-fill me-2">
                            <label class="form-label" style="color: black;">Name</label>
                            <input type="text" name="name" class="form-control" @if (Auth::id()) value="{{ Auth::user()->name }}" @endif required>
                        </div>
                        <div class="flex-fill ms-2">
                            <label class="form-label" style="color: black;">Email</label>
                            <input type="email" name="email" class="form-control" @if (Auth::id()) value="{{ Auth::user()->email }}" @endif required>
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="mb-3">
                        <label class="form-label" style="color: black;">Phone</label>
                        <input type="text" name="phone" class="form-control" @if (Auth::id()) value="{{ Auth::user()->phone }}" @endif required>
                    </div>

                    <!-- Date Fields -->
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="flex-fill me-2">
                            <label class="form-label" style="color: black;">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="flex-fill ms-2">
                            <label class="form-label" style="color: black;">End Date</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    
                    <!-- Payment Button -->
                    <div class="text-end">
                        <button type="button" class="btn team-btn btn-primary" onclick="payWithRazorpay()">Pay & Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function changeMainImage(src) {
        document.getElementById('mainImage').src = src;
        document.getElementById('modalImage').src = src;
    }

    document.getElementById('mainImage').addEventListener('click', function () {
        document.getElementById('modalImage').src = this.src;
    });

    function payWithRazorpay() {
    const options = {
        "key": "{{ env('RAZORPAY_KEY') }}", // API Key from Razorpay Dashboard
        "amount": {{ $rooms->price * 100 }}, // Amount in paise (Razorpay works in paise, hence the multiplication by 100)
        "currency": "INR", // Currency in which the payment will be made
        "name": "Hotel Booking", // Name to be displayed in the payment form
        "description": "Room Booking Payment", // Description of the payment
        "handler": function (response) {
            // After successful payment, handle the payment response
            let form = document.getElementById('bookingForm');
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'razorpay_payment_id';
            input.value = response.razorpay_payment_id; // Attach the Razorpay payment ID to the form
            form.appendChild(input);
            form.submit(); // Submit the form to complete the booking
        },
        "prefill": {
            "name": "{{ Auth::id() ? Auth::user()->name : '' }}", // Pre-fill the user's name if logged in
            "email": "{{ Auth::id() ? Auth::user()->email : '' }}" // Pre-fill the user's email if logged in
        },
        "theme": {
            "color": "#0d6efd" // Custom color for the payment modal
        },
        "modal": {
            "ondismiss": function() {
                alert("Payment process was canceled."); // Alert if the payment process is canceled
            }
        },
        "payment_capture": 1 // Automatically capture the payment
    };

    const rzp = new Razorpay(options); // Initialize Razorpay with the options
    rzp.open(); // Open the Razorpay payment modal
}

</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
