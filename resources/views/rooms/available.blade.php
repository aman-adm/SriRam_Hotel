@extends('HomeLayout.home')

@section('content')

@if($rooms->isEmpty())
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>No Available Rooms</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-center m-5">
            <h1><b class="text-dark">No rooms available for selected dates.</b></h1>
        </div>
    </div>
@else
    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Our Rooms</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <p class="margin_0">Lorem Ipsum available, but the majority have suffered</p>
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
                                <span>₹ {{ $room->price }}</span>
                                <table class="table table-bordered mt-2">
                                    <tr>
                                        <th>Wifi</th>
                                        <td>{{ $room->wifi ? 'Available' : 'Not Available' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Room Type</th>
                                        <td>{{ $room->room_type }}</td>
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
@endif

@endsection
