<!-- === SIDEBAR === -->
<div id="sidebar" class="sidebar text-center">
    <!-- Tombol Hamburger -->
    <div class="toggle-wrapper text-end">
        <button id="toggleSidebar"
            class="btn btn-light d-inline-flex align-items-center justify-content-center shadow-sm"
            style="border:2px solid #f8d7da; width:40px; height:40px; border-radius:15px;">
            <i class="bi bi-list fs-4" style="color:#b87f7f;"></i>
        </button>
    </div>

    <img src="{{ asset('img/luxe-nail-1.png') }}" alt="Luxe Nail Logo" width="80" height="80"
        class="sidebar-logo rounded-circle shadow-sm mb-3">

    <h4 class="fw-bold">LUXE NAIL</h4>
    <hr class="divider">

    <div class="menu text-start mt-4">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <i class="bi bi-house-door me-2"></i> Dashboard
        </a>

        <a href="{{ route('reservations.create') }}" class="{{ request()->routeIs('reservations.create') ? 'active' : '' }}">
            <i class="bi bi-calendar-check me-2"></i> Reservations
        </a>

        <a href="{{ route('staff.index') }}" class="{{ request()->routeIs('staff.index') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i> Staff
        </a>

        <a href="#">
            <i class="bi bi-cash-stack me-2"></i> Incomes
        </a>

        <a href="{{ route('profile.index') }}" class="{{ request()->routeIs('profile.index') ? 'active' : '' }}">
            <i class="bi bi-person me-2"></i> Profile
        </a>

        <hr class="divider">

        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-link text-danger fw-semibold p-0 text-start" style="text-decoration:none;">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </button>
</form>

    </div>
</div>

<style>
    /* === ACTIVE MENU STYLE === */
    .menu a {
        display: block;
        padding: 10px 15px;
        margin: 5px 0;
        color: #555;
        text-decoration: none;
        border-radius: 10px;
        transition: 0.3s;
    }

    .menu a:hover,
    .menu a.active {
        background-color: #f8d7da;
        color: #b87f7f;
        font-weight: 600;
    }

    .divider {
        border-top: 2px solid #f8d7da;
        margin: 15px 0;
    }
</style>
