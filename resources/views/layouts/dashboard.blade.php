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
    @include('layouts.sidebar')

    <!-- === MAIN CONTENT === -->
    <div id="main-content" class="main-content">
        <!-- === TOPBAR === -->
        <div class="topbar d-flex justify-content-between align-items-center mb-4 px-2">
            <div class="d-flex align-items-center gap-3">
                <div class="greeting">
                    <h2>Hello Owner!</h2>
                    <h5>Get ready for a productive day with Luxe Nail</h5>
                </div>
            </div>

            <div class="user-info d-flex align-items-center gap-2">
                <i class="bi bi-bell fs-5 text-secondary"></i>
            </div>
        </div>

        <!-- === DASHBOARD CARDS === -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- === Sidebar Toggle Script === -->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('sidebar-collapsed');
        });
    </script>
</body>

</html>