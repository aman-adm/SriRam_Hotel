<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @stack('title')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{url('dashboard/css/styles.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ url('richtexteditor/rte_theme_default.css') }}" />
    @if($globalLogo)
    <link rel="icon" href="{{ asset('logo/' . $globalLogo->favicon_icon) }}" class="logo-img" type="image/x-icon">
    @endif
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ url('richtexteditor/plugins/all_plugins.js') }}"></script>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand -->
    <a class="navbar-brand ps-3" href="{{ url('admin') }}">
        <i class="fas fa-tachometer-alt"></i> Admin Dashboard
    </a>

    <!-- Sidebar Toggle (Hamburger Menu) -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Right Section -->
    <ul class="navbar-nav ms-auto">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i> Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <!-- Website Link -->
                <li><a class="dropdown-item" href="{{ url('/') }}" target="_blank">Go To Website</a></li>
                <li><hr class="dropdown-divider" /></li>
                <!-- Logout Option -->
                <li><a class="dropdown-item" href="{{ url('admin/logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
