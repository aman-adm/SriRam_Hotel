@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 style="margin: 20px 0; font-weight: bold; color: #333;">Room List</h2>
            <table id="datatablesSimple" class="table table-bordered table-striped datatable"
                style="width: 100%; border: 1px solid #ccc; font-size: 14px;">
                <thead style="background-color: #343a40; color: white;">
                    <tr>
                        <th style="padding: 10px;">Room Title</th>
                        <th style="padding: 10px;">Price</th>
                        <th style="padding: 10px;">WiFi</th>
                        <th style="padding: 10px;">Room Type</th>
                        <th style="padding: 10px;">Description</th>
                        <th style="padding: 10px;">Image</th>
                        <th style="padding: 10px;">Delete</th>
                        <th style="padding: 10px;">Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td style="padding: 8px;">{{ $room->room_title }}</td>
                        <td style="padding: 8px;">₹ {{ number_format($room->price, 2) }}</td>
                        <td style="padding: 8px;">{{ $room->wifi ? 'Available' : 'Not Available' }}</td>
                        <td style="padding: 8px;">{{ $room->room_type }}</td>
                        <td style="padding: 8px;">{!! $room->description !!}</td>
                        <td style="padding: 8px;">
                        <figure>
                            @php
                                // Check if the image field is not null and contains valid JSON
                                $images = $room->image ? json_decode($room->image, true) : null;
                            @endphp

                            @if ($images && isset($images[0]))
                                <img src="{{ asset($images[0]) }}" alt="Room Image" />
                            @else
                                <img src="{{ asset('default-image.jpg') }}" alt="Default Room Image" />
                            @endif
                        </figure>
                        </td>
                        <td style="padding: 8px;">
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure to delete this room?');"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    style="padding: 5px 10px;">Delete</button>
                            </form>
                        </td>
                        <td style="padding: 8px;">
                            <a href="{{ url('room_update', $room->id) }}" class="btn btn-warning btn-sm"
                                style="padding: 5px 10px;">Update</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
@push('scripts')
<!-- jQuery (required by DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTable Initialization -->
<script>
$(document).ready(function() {
    $('#roomTable').DataTable({
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search rooms..."
        }
    });
});
</script>
@endpush