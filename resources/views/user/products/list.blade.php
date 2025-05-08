@extends('user.layouts.main')
@push('title')
    <title>Room Bookings - Admin</title>
@endpush
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid py-3 mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6">

                    @if(session('success'))
                        <div class="alert alert-success mt-5">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive mt-5">
                        <table id="datatablesSimple" class="table table-bordered table-striped text-center" style="font-size: 0.85rem; max-width: 100%; margin: auto;">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->email }}</td>
                                        <td>{{ $product->phone }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->check_in_date)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->check_out_date)->format('d M Y') }}</td>
                                        <td>
                                            <div class="d-grid gap-2">
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No bookings found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
@endsection
