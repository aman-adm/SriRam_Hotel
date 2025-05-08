@extends('user.layouts.main')

@push('title')
    <title>Dashboard - User</title>
@endpush

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                <h2 class="text-center mb-5 fw-bold text-dark">User Profile</h2>

                @if(session('success'))
                    <div class="alert alert-success col-md-6 mx-auto">{{ session('success') }}</div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm rounded-4">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-md-3">
                            <label for="name" class="col-form-label">Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-md-3">
                            <label for="email" class="col-form-label">Email</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center mb-3">
                        <div class="col-md-3">
                            <label for="phone" class="col-form-label">Phone</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                        </div>
                    </div>

                    <div class="row g-3 align-items-start mb-4">
                        <div class="col-md-3">
                            <label for="profile_image" class="col-form-label">Profile Image</label>
                        </div>
                        <div class="col-md-9">
                            @if($user->profile_image)
                                <div class="mb-2">
                                    <img src="{{ asset('profile_image/' . $user->profile_image) }}" alt="{{ $user->name }}" class="rounded-circle" height="80" width="80">
                                </div>
                            @endif
                            <input type="file" id="profile_image" name="profile_image" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
