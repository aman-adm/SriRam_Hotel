
<!-- Sidebar Layout Wrapper -->
<div id="layoutSidenav">
    <!-- Sidebar Nav -->
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark shadow-sm" id="sidenavAccordion">
            <div class="sb-sidenav-menu py-3">
                <div class="nav flex-column">

                    <!-- Dashboard -->
                    <a class="nav-link d-flex align-items-center gap-2 text-white {{ request()->is('account/dashboard') ? 'active' : '' }}"
                       href="{{ url('account/dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        <span>Dashboard</span>
                    </a>

                    <!-- Book Room -->
                    
                    <!-- Settings -->
                    <a class="nav-link d-flex align-items-center gap-2 text-white {{ request()->routeIs('profile.edit') ? 'active' : '' }}"
                       href="{{ route('profile.edit') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                        <span>Settings</span>
                    </a>

                </div>
            </div>

            <!-- Footer -->
            <div class="sb-sidenav-footer text-white bg-secondary">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>
</div>
