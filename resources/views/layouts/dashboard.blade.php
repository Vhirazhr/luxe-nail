<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Nail Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <!-- === SIDEBAR === -->
    <div class="sidebar">
        <h4>LUXE NAIL</h4>
        <a href="#" class="active"><i class="bi bi-house-door me-2"></i> Dashboard</a>
        <a href="#"><i class="bi bi-person me-2"></i> profile</a>
        <a href="#"><i class="bi bi-calendar-check me-2"></i> Reservations</a>
        <a href="#"><i class="bi bi-person-heart me-2"></i> Data Customers</a>
        <a href="#"><i class="bi bi-cash-stack me-2"></i> Incomes</a>
        <a href="#"><i class="bi bi-people me-2"></i> Staff</a>
    </div>

    <!-- === MAIN CONTENT === -->
    <div class="main-content">
        <div class="topbar d-flex justify-content-between align-items-center mb-4">
        <div class="greeting">
            <h2>Hello Owner!</h2>
            <h5>Get ready for a productive day with Luxe Nail</h5>
        </div>
        <div class="user-info d-flex align-items-center gap-2">
            <i class="bi bi-bell fs-5 text-dark"></i>
            <img src="{{ asset('img/luxe-nail-1.png') }}" 
                 alt="Luxe Nail Logo" 
                 width="60" 
                 height="60" 
                 class="rounded-circle shadow-sm">
        </div>
    </div>

        <!-- === DASHBOARD CARDS === -->
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="card-stat shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Reservations</h6>
                            <h3>85</h3>
                        </div>
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card-stat shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Services</h6>
                            <h3>12</h3>
                        </div>
                        <i class="bi bi-brush"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card-stat shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Staff</h6>
                            <h3>8</h3>
                        </div>
                        <i class="bi bi-person-badge"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- === CONTENT AREA (Dynamic Section) === -->
        <div class="mt-5">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>