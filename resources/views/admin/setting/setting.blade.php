@extends('admin.includes.main')

<head>
<style>
    .setting-card {
        border: none;
        border-radius: 1rem;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .setting-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .setting-icon {
        font-size: 2.5rem;
        color:#000000;
    }
</style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


@push('title')
    <title>Dashboard - Admin</title>
@endpush

@section('content')


<div id="layoutSidenav_content">
    <main>
        <div class="container py-5">
            <h2 class="text-center mb-5 fw-bold text-dark">Admin Settings</h2>

            <div class="row g-4 justify-content-center">

                <!-- Logo Setting Card -->
                <div class="col-md-4 col-sm-6">
                    <a href="{{ url('admin/logo') }}" class="text-decoration-none">
                        <div class="card setting-card shadow-lg rounded-4 h-100 p-3">
                            <div class="card-body text-center">
                                <i class="fas fa-hotel setting-icon mb-3"></i>
                                <h5 class="card-title fw-bold text-dark">Logo Setting</h5>
                                <p class="card-text text-muted">Upload and manage your site's logo and favicon.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Color Setting Card -->
                <div class="col-md-4 col-sm-6">
                    <a href="{{ url('admin/colors') }}" class="text-decoration-none">
                        <div class="card setting-card shadow-lg rounded-4 h-100 p-3">
                            <div class="card-body text-center">
                                <i class="fas fa-eye-dropper setting-icon mb-3"></i>
                                <h5 class="card-title fw-bold text-dark">Color Setting</h5>
                                <p class="card-text text-muted">Manage your website's theme and color palette.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- About Us Setting Card -->
                <div class="col-md-4 col-sm-6">
                    <a href="{{ route('about.index') }}" class="text-decoration-none">
                        <div class="card setting-card shadow-lg rounded-4 h-100 p-3">
                            <div class="card-body text-center">
                                <i class="fas fa-user-circle setting-icon mb-3"></i>
                                <h5 class="card-title fw-bold text-dark">About Us Setting</h5>
                                <p class="card-text text-muted">Edit and update your About Us section content.</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </main>
</div>
@endsection
