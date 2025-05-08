@extends('HomeLayout.home')
@section('content')
@php
$about = \App\Models\AboutUs::first();
@endphp
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="titlepage">
                    <p class="margin_0">
                        {{ $about->content ?? 'About us content goes here.' }}
                    </p>
                    <a class="read_more btn-team" href="Javascript:void(0)"> Read More</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="about_img">

                    @if($about && $about->image)
                    <figure><img src="{{ asset('storage/'.$about->image) }}" alt="About Us Image" /></figure>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection