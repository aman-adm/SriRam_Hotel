@extends('HomeLayout.home')
@section('content')
<section id="home" class="banner_wrapper p-0 mt-2">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
            <div class="swiper-slide" style="background-image: url('{{ asset('storage/' . $slide->image) }}')">
                <div class="slide-caption text-center">
                    <div>
                        <h1>{{ $slide->title }}</h1>
                        <p>{{ $slide->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="swiper-pagination"></div>
    </div>

    <div class="container booking-area">
    <form class="row" method="GET" action="{{ url('check-availability') }}">
    @csrf
    <div class="col-lg mb-3">
        <input type="date" class="form-control" name="start_date" required min="{{ \Carbon\Carbon::today()->toDateString() }}">
    </div>
    <div class="col-lg mb-3">
        <input type="date" class="form-control" name="end_date" required min="{{ \Carbon\Carbon::today()->toDateString() }}">
    </div>
    <div class="col-lg mb-3">
        <select name="adults" class="form-control" required>
            <option value="" selected disabled>Adults</option>
            @for($i = 0; $i <= 10; $i++) 
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="col-lg mb-3">
        <select name="children" class="form-control">
            <option value="" selected disabled>Children</option>
            @for($i = 0; $i <= 10; $i++) 
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="col-lg mb-3">
        <button class="btn team-btn" type="submit">Check Availability</button>
    </div>
</form>



       

    </div>
</section>
<script>
var swiper = new Swiper(".banner_wrapper .swiper", {
    direction: "vertical", // or "horizontal" if you want to switch later
    loop: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
</script>
<!-- end banner -->
<!-- about -->
<div class="about">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-5">
                <div class="titlepage">
                    <h2>About Us</h2>
                    <p class="margin_0">
                        {{ $about->content ?? 'About us content goes here.' }}
                    </p>
                    <a class="read_more" href="Javascript:void(0)"> Read More</a>
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
<!-- end about -->
<!-- our_room -->
<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                </div>
            </div>
        </div>
     
        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-md-4 col-sm-6">
                <div class="blog_box">
                    <div class="blog_img">
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
                    </div>
                    <div class="blog_room">
                        <h3>{{ $room->room_title }}</h3>
                        <span> ₹ {{ $room->price }}</span>
                        <table class="table table-bordered">
                        <tr>
                                <th>Wifi</th>
                                <td>{{ $room->wifi ? 'Available' : 'Not Available' }}</td>
                            </tr>
                            <tr>
                                <th>Room Type</th>
                                <td> {{ $room->room_type }}</td>
                            </tr>
                            <tr>
                                <th>Adult Capacity</th>
                                <td>{{ $room->adults }}</td>
                            </tr>
                            <tr>
                                <th>Child Capacity</th>
                                <td>{{ $room->children }}</td>
                            </tr>
                        </table>
                        <a href="{{ url('room_details', $room->id) }}">
                            <button class="btn team-btn mt-2">ROOM DETAILS</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end our_room -->
<!-- gallery -->
<div class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>gallery</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($gallary as $item)
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="gallery_img text-center">
                    <figure>
                        <img src="{{ asset('gallary/' . $item->image) }}" alt="Gallery Image"
                            class="img-fluid rounded shadow-sm" style="height: 200px; object-fit: cover;">
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end gallery -->
<!-- blog -->
<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Blog</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="blog_box">
                    <div class="blog_img">
                        <figure><img src="{{ asset('storage/' . $blog->image) }}" alt="#" /></figure>
                    </div>
                    <div class="blog_room">
                        <h3>{{ $blog->title }}</h3>
                        <span>The standard chunk</span>
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="titlepage">
                <h2>Contact Us</h2>
            </div>
            <div class="col-md-6 d-flex">
                <div class="card-equal w-100">
                    <div class="form-container p-3">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form id="request" class="main_form" action="{{ url('contact') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control contactus" placeholder="Name" type="text" name="name" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control contactus" placeholder="Email" type="email" name="email"
                                required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control contactus" placeholder="Phone Number" type="tel" name="phone"
                                required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control textarea" placeholder="Message" name="message" rows="5"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg team-btn">Send Message</button>
                        </div>
                    </form>
                    {!! NoCaptcha::renderJs() !!}
                </div>
                <div class="col-md-6">
                    <div class="map_main">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.904627298332!2d77.21930377528908!3d28.632620375664665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd036e191a13%3A0x7161661be3c6477!2sPosistrength%20Software%20Solution%20Pvt.Ltd.!5e0!3m2!1sen!2sin!4v1745209127197!5m2!1sen!2sin"
                                width="100%" height="570" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection