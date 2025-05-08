@extends('HomeLayout.home')
@section('content')
<div class="back_re">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center py-4">
                    <h2>Contact Us</h2>
                </div>
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="contact py-5">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6">
                <form id="request" class="main_form" action="{{ url('contact') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control contactus" placeholder="Name" type="text" name="name" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control contactus" placeholder="Email" type="email" name="email" required>
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
                    <div class="map-responsive rounded overflow-hidden shadow-sm">
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
@endsection