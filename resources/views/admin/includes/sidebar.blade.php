<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <a class="nav-link" href="{{url('admin/dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fas fa-hotel"></i></div> Hotel Rooms
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('room_create')}}"> <i
                                        class="fa fa-plus-circle"></i> Add Rooms </li>
                            <li><a class="dropdown-item" href="{{url('view_room')}}"> <i class="fa fa-eye"></i> View
                                    Rooms </a></li>

                        </ul>
                    </li>
                    <a class="nav-link" href="{{url('bookings')}}">
                        <div class="sb-nav-link-icon"> <i class="fa fa-calendar"></i></div>
                        Booking
                    </a>
                    <a class="nav-link" href="{{url('all_messages')}}">
                        <div class="sb-nav-link-icon"><i class="fa fa-envelope"></i></div>
                        Messages
                    </a>
                    <a class="nav-link" href="{{url('view_gallary')}}">
                        <div class="sb-nav-link-icon"><i class="fa fa-image"></i></div>
                        Gallery
                    </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fas fa-pen-nib"></i></div>
                            Blog
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('admin.blog.create') }}">
                                    <i class="fa fa-plus-circle"></i>
                                    <span>Add Blog</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('admin.blog.index') }}">
                                    <i class="fa fa-eye"></i>
                                    <span>View Blogs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                            Slide
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('admin.slides.create') }}">
                                    <i class="fa fa-plus-circle"></i>
                                    <span>Add Slide</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2"
                                    href="{{ route('admin.slides.index') }}">
                                    <i class="fa fa-eye"></i>
                                    <span>View Slides</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <a class="nav-link" href="{{url('admin/Setting')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                        Setting
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Admin
            </div>
        </nav>
    </div>