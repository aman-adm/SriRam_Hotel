@extends('HomeLayout.home')

@section('content')
<head>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body, .booking-success-bg, .booking-card, .swagat-heading, .swagat-icon, h2, p, a, i {
            font-family: 'Poppins', sans-serif;
        }

        /* Dark Mode Background and Text */
        body, .booking-success-bg {
            background-color: #1a1a1a;
            color: white;
        }

        .booking-card {
            animation: fadeInUp 1s ease-out;
            background-color: rgba(0, 0, 0, 0.85);
            border-radius: 1rem;
            padding: 3rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Highlighted Booking Confirmation */
        .confirmation-section {
            background-color: #333;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
            animation: pulse 1.5s infinite;
        }

        .confirmation-icon {
            font-size: 3.5rem;
            color: gold;
        }

        .swagat-heading {
            font-size: 1.75rem;
            font-weight: 600;
            color: gold;
        }

        .swagat-icon {
            font-size: 3rem;
            color: gold;
        }

        h2 {
            font-size: 2rem;
            font-weight: 600;
            color: gold;
        }

        .lead {
            font-size: 1.2rem;
            font-weight: 400;
            color: #ddd;
        }

        .text-muted {
            color: #aaa;
        }

        /* Button Styling */
        .btn-home {
            background-color: gold;
            color: black;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: background 0.3s, color 0.3s;
        }

        .btn-home:hover {
            background-color: #d4af37;
            color: white;
        }

        /* Animation Keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
            }
            50% {
                box-shadow: 0 0 30px rgba(255, 215, 0, 1);
            }
            100% {
                box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
            }
        }
    </style>
</head>

<div class="booking-success-bg mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="card booking-card shadow-lg border-0">
                    <!-- Swagat Message with Icon -->
                    <div class="mb-4">
                        <i class="bi bi-emoji-smile swagat-icon"></i>
                        <div class="swagat-heading mt-3">स्वागत है! Welcome to The RamKrishna Palace</div>
                    </div>

                    <!-- Booking Confirmation Section Highlighted -->
                    <div class="confirmation-section mb-4">
                        <i class="bi bi-check-circle-fill confirmation-icon"></i>
                        <h2 class="fw-bold">Booking Confirmed!</h2>
                        <p class="lead">Your hotel room has been successfully booked.</p>
                        <p class="lead">Thank you for choosing our hotel. We look forward to hosting you!</p>
                    </div>

                    <!-- Back to Home Button -->
                    <a href="{{ route('home') }}" class="btn btn-home mt-4">
                        <i class="bi bi-house-door-fill me-2"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
