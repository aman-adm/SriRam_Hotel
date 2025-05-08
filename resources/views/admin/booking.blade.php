@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container-fluid">
                <h2 style="margin-bottom: 20px; font-weight: bold; color: #333;">Room Booking Details</h2>
                <table id="datatablesSimple" class="table table-bordered table-striped datatable"
                    style="width: 100%; border: 1px solid #dee2e6; font-size: 14px;">
                    <thead style="background-color: #343a40; color: white;">
                        <tr>
                            <th style="padding: 10px;">Room ID</th>
                            <th style="padding: 10px;">Customer Name</th>
                            <th style="padding: 10px;">Email</th>
                            <th style="padding: 10px;">Phone</th>
                            <th style="padding: 10px;">Arrival Date</th>
                            <th style="padding: 10px;">Leaving Date</th>
                            <th style="padding: 10px;">Payment Method</th> <!-- new -->
                            <th style="padding: 10px;">Status</th>
                            <th style="padding: 10px;">Status Update</th>
                            <th style="padding: 10px;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                        <tr>
                            <td style="padding: 8px;">{{ $room->room_id }}</td>
                            <td style="padding: 8px;">{{ $room->name }}</td>
                            <td style="padding: 8px;">{{ $room->email }}</td>
                            <td style="padding: 8px;">{{ $room->phone }}</td>
                            <td style="padding: 8px;">{{ $room->start_date }}</td>
                            <td style="padding: 8px;">{{ $room->end_date }}</td>
                            <td style="padding: 8px;">{{ ucfirst($room->payment_method) }}</td>
                            <td style="padding: 8px;">
                                @if ($room->status=='approve')
                                <span style="color: green; font-weight: bold;">Approved</span>
                                @elseif ($room->status=='reject')
                                <span style="color: red; font-weight: bold;">Rejected</span>
                                @elseif ($room->status=='waiting')
                                <span style="color: orange; font-weight: bold;">Waiting</span>
                                @endif
                            </td>
                            <td style="padding: 8px;">
                                <a href="{{ route('approve.book', $room->id) }}" class="btn btn-success mb-1"
                                    style="margin-bottom: 5px;">Approve</a>
                                <a href="{{ route('reject.book', $room->id) }}" class="btn btn-danger mb-1">Reject</a>
                            </td>
                            <td style="padding: 8px;">
                                <form action="{{ url('/delete_booking/' . $room->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this booking?');"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        style="padding: 5px 10px;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection