@extends('admin.includes.main')
@push('title')
<title>Dashboard - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container-fluid">
                <h2 class="mb-4" style="font-size: 24px; color: #343a40;">Client Messages</h2>
                <table id="datatablesSimple" class="table table-bordered table-hover"
                    style="width: 100%; font-size: 15px; border-collapse: collapse;">
                    <thead style="background-color: #343a40; color: #ffffff;">
                        <tr>
                            <th style="padding: 12px; border: 1px solid #dee2e6;">Name</th>
                            <th style="padding: 12px; border: 1px solid #dee2e6;">Email</th>
                            <th style="padding: 12px; border: 1px solid #dee2e6;">Phone</th>
                            <th style="padding: 12px; border: 1px solid #dee2e6;">Message</th>
                            <th style="padding: 12px; border: 1px solid #dee2e6;">Send Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $booking)
                        <tr style="background-color: #f8f9fa;">
                            <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $booking->name }}</td>
                            <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $booking->email }}</td>
                            <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $booking->phone }}</td>
                            <td style="padding: 10px; border: 1px solid #dee2e6;">{!!$booking->message !!}</td>
                            <td style="padding: 10px; border: 1px solid #dee2 e6;"> <a class="btn btn-success"
                                    href="{{url('send_mail',$booking->id)}}">Send Mail</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 12px;">No bookings found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection