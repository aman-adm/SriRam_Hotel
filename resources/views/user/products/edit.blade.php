@extends('user.layouts.main')

@push('title')
    <title>Edit Booking - User</title>
@endpush

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container py-5 mt-5"> {{-- 👈 spacing for lower position --}}

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card shadow rounded-4 border-0">
                        <div class="card-header bg-dark text-white rounded-top-4">
                            <h4 class="mb-0">Edit Booking</h4>
                        </div>

                        <div class="card-body p-4">
                            {{-- Success Message --}}
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            {{-- Validation Errors --}}
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Edit Form --}}
                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input value="{{ old('name', $product->name) }}" type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input value="{{ old('email', $product->email) }}" type="email" name="email" id="email"
                                           class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input value="{{ old('phone', $product->phone) }}" type="text" name="phone" id="phone"
                                           class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="check_in_date" class="form-label">Check-in Date</label>
                                        <input value="{{ old('check_in_date', $product->check_in_date) }}" type="date" name="check_in_date" id="check_in_date"
                                               class="form-control @error('check_in_date') is-invalid @enderror">
                                        @error('check_in_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="check_out_date" class="form-label">Check-out Date</label>
                                        <input value="{{ old('check_out_date', $product->check_out_date) }}" type="date" name="check_out_date" id="check_out_date"
                                               class="form-control @error('check_out_date') is-invalid @enderror">
                                        @error('check_out_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
</div>
@endsection
