@extends('user.layouts.main')

@push('title')
<title>Dashboard - User</title>
@endpush

@section('content')
<div id="layoutSidenav">
    {{-- Sidebar will be auto-included from main layout --}}
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                <!-- Dashboard Heading -->
                <h2 class="text-center mb-5 fw-bold text-dark">User Dashboard</h2>

                <!-- Booking Summary Cards -->
                <div class="row text-center mb-5">
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-lg rounded-4">
                            <div class="card-body">
                                <h6 class="text-secondary">Total Bookings</h6>
                                <h2 class="text-dark fw-bold">{{ $bookings->count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-lg rounded-4">
                            <div class="card-body">
                                <h6 class="text-secondary">Pending Bookings</h6>
                                <h2 class="text-dark fw-bold">{{ $bookings->where('status', 'pending')->count() }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-lg rounded-4">
                            <div class="card-body">
                                <h6 class="text-secondary">Rooms Booked</h6>
                                <h2 class="text-dark fw-bold">{{ $bookings->pluck('room_id')->unique()->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Table Section -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h4 class="text-center mb-3 text-dark">Your Booking Details</h4>
                        @if($bookings->count())
                        <div class="table-responsive rounded shadow-sm">
                            <table id="datatablesSimple" class="table table-hover text-center align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Room ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->room_id }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</td>
                                        <td class="text-capitalize">
                                            <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : 'success' }}">
                                                {{ $booking->status }}
                                            </span>
                                        </td>
                                        <td class="text-capitalize">{{ $booking->payment_method }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-center text-muted mt-4">No bookings found yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
